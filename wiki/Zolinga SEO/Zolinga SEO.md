Priority: 0.5

# Zolinga SEO

Module providing SEO services for Zolinga. Currently supports URL submission to search engines via [IndexNow](https://www.bing.com/indexnow).

## IndexNow: Submit URLs

Other modules can notify search engines about new or updated content by firing the `seo:submit` event.

### Usage

```php
global $api;

$api->dispatchEvent(
    new \Zolinga\System\Events\RequestResponseEvent(
        'seo:submit',
        \Zolinga\System\Types\OriginEnum::INTERNAL,
        new \ArrayObject([
            'urlList' => [
                ['url' => '/blog/new-post'],
                ['url' => '/blog/updated-post'],
            ]
        ])
    )
);
```

URLs may be relative — the handler resolves them to absolute using `$api->url->resolveUrl()` before submission.

### Configuration

In `zolinga.json` or `config/global.json` / `config/local.json`:

```json
{
    "seo": {
        "indexNow": {
            "enabled": true,
            "apiKey": "your-api-key-here"
        }
    }
}
```

| Key | Description |
|-----|-------------|
| `enabled` | Set to `true` to activate IndexNow submissions. |
| `apiKey` | Your IndexNow API key from [bing.com/indexnow/getstarted](https://www.bing.com/indexnow/getstarted). |

The API key verification file must be placed at `public/{apiKey}.txt` containing just the key.

### Response Handling

| HTTP Code | Meaning |
|-----------|---------|
| 200 | URLs submitted successfully |
| 400 | Invalid format |
| 403 | API key not valid or key file not found |
| 422 | URLs don't belong to host or key mismatch |
| 429 | Too many requests (potential spam) |

All responses are logged via `$api->log`.
