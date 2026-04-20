# Event: seo:submit

Submit URLs to search engines via IndexNow.

## Origin

`internal`

## Request

```json
{
    "urlList": [
        {"url": "/blog/new-post"},
        {"url": "/about"}
    ]
}
```

| Parameter | Type | Description |
|-----------|------|-------------|
| `urlList` | array | List of objects, each with a `url` string (may be relative). |

URLs are resolved to absolute via `$api->url->resolveUrl()` before submission.

## Response

The event status is set to the HTTP response code from IndexNow:

| Status | Meaning |
|--------|---------|
| 200 | URLs submitted successfully |
| 400 | No valid URLs or invalid format |
| 403 | API key not valid |
| 422 | URLs don't belong to host |
| 429 | Too many requests |
| 500 | API key not configured or unexpected error |

## Example

```php
global $api;

$event = new \Zolinga\System\Events\RequestResponseEvent(
    'seo:submit',
    \Zolinga\System\Types\OriginEnum::INTERNAL,
    new \ArrayObject([
        'urlList' => [
            ['url' => '/blog/my-new-article'],
        ]
    ])
);

$api->dispatchEvent($event);

if ($event->status === 200) {
    // success
}
```

## Configuration

Requires `seo.indexNow.enabled` = `true` and a valid `seo.indexNow.apiKey` in config.

See [Zolinga SEO](../../Zolinga SEO/Zolinga SEO.md) for details.
