---
name: zolinga-seo-technical-requirements
description: "Google Search technical requirements, spam policies, structured data, canonical URLs, and violations to avoid. Use when reviewing technical SEO health or setting up new pages."
argument-hint: "[page or site]"
---

# SEO Technical Requirements and Policies

## Use When

- Setting up a new site or page technically
- Reviewing technical SEO health
- Checking for spam policy violations
- Implementing structured data
- Configuring canonical URLs and redirects
- Reviewing robots.txt and noindex usage

## Technical Requirements

The technical requirements cover the bare minimum Google needs to show a page in search results. Most sites pass these without realizing it.

Key requirements:
- Google must be able to crawl the page.
- The page must not block indexing (unless intentionally).
- The page must return a 200 OK status (not 4xx or 5xx).
- Content must be accessible without requiring login or special permissions (unless intended).

Sources: https://developers.google.com/search/docs/essentials/technical

## Spam Policies

Behaviors and tactics that can lead to lower ranking or complete omission from Google Search:

- **Cloaking**: Showing different content to users and search engines.
- **Doorway pages**: Pages created to rank for specific search queries with little unique value.
- **Hacked content**: Content placed on your site without permission due to security vulnerabilities.
- **Hidden text and links**: Content visible to search engines but not to users.
- **Keyword stuffing**: Filling pages with keywords in an unnatural way.
- **Link spam**: Buying or selling links, excessive link exchanges, using automated programs to create links.
- **Malware and phishing**: Hosting malicious software or deceptive pages.
- **Misleading functionality**: Services or pages that trick users into thinking they can access something they cannot.
- **Scraped content**: Copying content from other sites without adding original value.
- **Spammy automatically-generated content**: Content generated programmatically without producing anything original or adding sufficient value.
- **Thin affiliate pages**: Pages with copied product descriptions and reviews that add no additional value.
- **User-generated spam**: Spammy content posted by users on forums, comments, etc.

Sources: https://developers.google.com/search/docs/essentials/spam-policies

## Key Best Practices (Search Essentials)

- Create helpful, reliable, people-first content.
- Use words people would search for in prominent locations: title, main heading, alt text, link text.
- Make links crawlable so Google can find other pages on your site.
- Tell people about your site. Be active in communities.
- Follow best practices for images, videos, structured data, and JavaScript.
- Enhance how your site appears in search with structured data and other features.
- Use appropriate methods to control how your content appears in search.

Sources: https://developers.google.com/search/docs/essentials

## Structured Data

- Valid structured data makes pages eligible for special features in search results: review stars, carousels, rich snippets, etc.
- Use JSON-LD format in `<script type="application/ld+json">` tags in the page `<head>`.
- Common types: SoftwareApplication, FAQPage, Organization, Product, Article, BreadcrumbList.
- Test structured data with the Rich Results Test tool.

Sources: https://developers.google.com/search/docs/appearance/structured-data/intro-structured-data

## Canonical URLs and Duplicate Content

- Search engines choose one canonical URL per piece of content.
- Having duplicate content is not a spam violation, but it wastes crawl resources.
- Prefer 301 redirects from duplicate URLs to the canonical URL.
- Use `<link rel="canonical">` when redirects are not possible.
- If you do nothing, Google will attempt to canonicalize automatically.

Sources: https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls

## robots.txt and noindex

- **robots.txt**: Prevents crawling but may not prevent indexing if Google finds the page through external links.
- **noindex meta tag**: Prevents indexing. Use this when you want a page excluded from search results.
- **Password protection**: Also prevents indexing.

Sources: https://developers.google.com/search/docs/crawling-indexing/control-what-you-share

## Sources

- https://developers.google.com/search/docs/essentials
- https://developers.google.com/search/docs/essentials/technical
- https://developers.google.com/search/docs/essentials/spam-policies
- https://developers.google.com/search/docs/appearance/structured-data/intro-structured-data
- https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls
- https://developers.google.com/search/docs/crawling-indexing/control-what-you-share
