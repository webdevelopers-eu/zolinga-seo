<?php

declare(strict_types=1);

namespace Zolinga\Seo\Listeners;

use Zolinga\System\Events\{RequestResponseEvent, ListenerInterface};
use Zolinga\System\Types\StatusEnum;

/**
 * Submits URLs to search engines via IndexNow API.
 * 
 * Listens to internal "seo:submit" event with request:
 *   {"urlList": [{"url": "/blog/my-post"}, ...]}
 * 
 * URLs may be relative — they are resolved to absolute before submission.
 *
 * @author Daniel Sevcik <danny@zolinga.org>
 */
class IndexNowListener implements ListenerInterface
{
    private const INDEXNOW_API = 'https://api.indexnow.org/IndexNow';

    /**
     * Handle the seo:submit event.
     *
     * @param RequestResponseEvent $event Event with request containing urlList.
     */
    public function onSubmit(RequestResponseEvent $event): void
    {
        global $api;

        $config = $api->config['seo']['indexNow'] ?? [];

        if (empty($config['enabled'])) {
            $api->log->info('seo', 'IndexNow is disabled, skipping URL submission.');
            $event->setStatus($event::STATUS_OK, 'IndexNow disabled, skipping.');
            return;
        }

        $apiKey = $config['apiKey'] ?? false;
        if (!$apiKey) {
            $api->log->error('seo', 'IndexNow API key is not configured.');
            $event->setStatus($event::STATUS_ERROR, 'IndexNow API key not configured.');
            return;
        }

        $urlList = $event->request['urlList'] ?? [];
        if (empty($urlList)) {
            $api->log->warning('seo', 'seo:submit called with empty urlList.');
            $event->setStatus($event::STATUS_BAD_REQUEST, 'No URLs to submit.');
            return;
        }

        // Resolve all URLs to absolute
        $resolvedUrls = [];
        foreach ($urlList as $item) {
            $url = $item['url'] ?? null;
            if (!$url) {
                continue;
            }
            $resolvedUrls[] = $api->url->resolveUrl($url);
        }

        if (empty($resolvedUrls)) {
            $api->log->warning('seo', 'seo:submit: no valid URLs after resolution.');
            $event->setStatus($event::STATUS_BAD_REQUEST, 'No valid URLs to submit.');
            return;
        }

        $this->submitToIndexNow($apiKey, $resolvedUrls, $event);
    }

    /**
     * POST URLs to the IndexNow API.
     *
     * @param string $apiKey IndexNow API key.
     * @param string[] $urls Absolute URLs to submit.
     * @param RequestResponseEvent $event The event to set status on.
     */
    private function submitToIndexNow(string $apiKey, array $urls, RequestResponseEvent $event): void
    {
        global $api;

        $apiKeyLocation = $api->url->resolveUrl("/{$apiKey}.txt");
        $host = parse_url($apiKeyLocation, PHP_URL_HOST);

        $payload = json_encode([
            'host' => $host,
            'key' => $apiKey,
            'keyLocation' => $apiKeyLocation,
            'urlList' => $urls,
        ], JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json; charset=utf-8\r\n",
                'content' => $payload,
                'ignore_errors' => true,
            ],
        ]);

        $response = @file_get_contents(self::INDEXNOW_API, false, $context);

        // Parse HTTP response code from $http_response_header
        $httpCode = 0;
        if (isset($http_response_header[0])) {
            preg_match('/\d{3}/', $http_response_header[0], $matches);
            $httpCode = (int) ($matches[0] ?? 0);
        }

        $count = count($urls);

        match ($httpCode) {
            200, 202 => $api->log->info('seo', "IndexNow[$host]: {$count} URL(s) submitted successfully (HTTP {$httpCode}). Submitted URLs: " . implode(", ", $urls)),
            400 => $api->log->error('seo', "IndexNow[$host]: Bad request (400). Invalid format. Failed to submit URLs: " . implode(", ", $urls)),
            403 => $api->log->error('seo', "IndexNow[$host]: Forbidden (403). API key not valid or key file not found. Failed to submit URLs: " . implode(", ", $urls)),
            422 => $api->log->error('seo', "IndexNow[$host]: Unprocessable Entity (422). URLs don't belong to host or key mismatch. Failed to submit URLs: " . implode(", ", $urls)),
            429 => $api->log->warning('seo', "IndexNow[$host]: Too Many Requests (429). Potential spam. Failed to submit URLs: " . implode(", ", $urls)),
            default => $api->log->error('seo', "IndexNow[$host]: Unexpected response code {$httpCode}. Body: " . ($response ?: '(empty)') . ". Failed to submit URLs: " . implode(", ", $urls)),
        };

        $status = StatusEnum::tryFrom($httpCode) ?? $event::STATUS_ERROR;
        $event->setStatus($status, "IndexNow responded with HTTP {$httpCode}.");
    }
}
