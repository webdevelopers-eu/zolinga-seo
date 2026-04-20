---
name: zolinga-seo-submit-url
description: Use when submitting URLs to search engines via the seo:submit event, including IndexNow configuration and URL resolution.
argument-hint: "<url-list>"
---

# Zolinga SEO: Submit URLs

## Use When

- Notifying search engines about new or updated pages.
- Integrating IndexNow URL submission into a module.

## Workflow

1. Fire the `seo:submit` internal event with a `urlList` array in the request.
2. Each entry is `{"url": "/relative/path"}` — URLs should be relative.
3. The handler resolves all URLs to absolute via `$api->url->resolveUrl()`.
4. URLs are POSTed to the IndexNow API (`https://api.indexnow.org/IndexNow`).
5. Ensure `seo.indexNow.enabled` is `true` and `seo.indexNow.apiKey` is set in config.
6. The API key verification file must exist at `public/{apiKey}.txt`.

## Quick Example

```php
global $api;

$api->dispatchEvent(
    new \Zolinga\System\Events\RequestResponseEvent(
        'seo:submit',
        \Zolinga\System\Types\OriginEnum::INTERNAL,
        new \ArrayObject([
            'urlList' => [
                ['url' => '/blog/new-post'],
            ]
        ])
    )
);
```

## Quick Checks

- Config: `$api->config['seo']['indexNow']['enabled']` must be `true`.
- API key file: `public/{apiKey}.txt` must contain just the key string.
- Responses are logged via `$api->log` under category `seo`.

## References

- `modules/zolinga-seo/wiki/Zolinga SEO/Zolinga SEO.md`
- `modules/zolinga-seo/wiki/ref/event/seo/submit.md`
