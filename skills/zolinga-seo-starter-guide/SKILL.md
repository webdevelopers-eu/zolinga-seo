---
name: zolinga-seo-starter-guide
description: "Google SEO starter guide fundamentals: how search works, site organization, URLs, content basics, images, videos, promotion, and common myths. Use when building, designing, or reviewing any web page or site structure."
argument-hint: "[page or site section]"
---

# SEO Starter Guide

## Use When

- Designing a new page or site section
- Updating content on an existing page
- Reviewing site structure, URLs, or navigation
- Adding or optimizing images and videos
- Planning site promotion strategy
- Debunking SEO myths with stakeholders

## How Google Search Works

Google is a fully automated search engine that uses crawlers to explore the web constantly, looking for pages to add to its index. Most sites are found and added automatically. You usually do not need to do anything except publish your site.

Key points:
- Google discovers pages primarily through links from other pages
- Crawling, indexing, and serving are automatic processes
- Changes take time: some take hours, others months. Wait a few weeks to assess impact.

Sources: https://developers.google.com/search/docs/fundamentals/how-search-works

## Help Google Find Your Content

### Ensure Crawlability

- Do not hide important components (CSS, JavaScript) from Google. Google needs to access the same resources as a user's browser to understand your pages.
- If your pages show different content based on user location, verify that the content Google sees from its US-based crawler location is acceptable.
- Use the URL Inspection Tool in Search Console to check how Google sees your page.

### Opting Out

- To block a page from search results, use appropriate methods: robots.txt, noindex meta tag, or password protection.
- robots.txt prevents crawling but may not prevent indexing if Google finds the page through links from other sites.
- Use noindex to prevent indexing.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Organize Your Site

### Use Descriptive URLs

- Include words in URLs that are useful for users. Example: `/pets/cats.html`
- Avoid URLs with only random identifiers. Example: `/2/6772756D707920636174`
- Google learns breadcrumbs automatically from URL words, but you can also influence them with structured data.

### Group Topically Similar Pages in Directories

- Use directories (folders) to group similar topics. This helps Google learn how often content in each directory changes.
- Example: `/policies/return-policy.html` vs `/promotions/new-promos.html`

### Reduce Duplicate Content

- Duplicate content is not a spam violation, but it wastes crawl resources and creates poor user experience.
- Ensure each piece of content is accessible through only one URL when possible.
- Use 301 redirects from non-preferred URLs to the canonical URL.
- If you cannot redirect, use `<link rel="canonical">`.
- If you do nothing, Google will try to canonicalize automatically.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Make Your Site Interesting and Useful

### Content Quality Basics

- Write easy-to-read, well-organized content. Break up long content with paragraphs, sections, and headings.
- Create unique content. Do not copy others' content in part or in full.
- Keep content up-to-date. Update or delete outdated content.
- Be helpful, reliable, and people-first.

### Expect Your Readers' Search Terms

- Think about the words users might search for to find your content.
- Different users use different keywords. Example: "charcuterie" vs "cheese board".
- Google's language matching is sophisticated; you do not need to use exact terms.

### Avoid Distracting Advertisements

- Do not let ads become overly distracting or prevent users from reading content.
- Avoid intrusive interstitials that make the site difficult to use.

### Link to Relevant Resources

- Links help users and search engines discover other pages.
- The vast majority of new pages Google finds are through links.
- Write good anchor text: it tells users and Google what the linked page contains.
- Only link to resources you trust. For untrusted external links, use `nofollow` or similar annotations.
- For user-generated content (forum posts, comments), ensure all user-posted links automatically get `nofollow`.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Influence How Your Site Looks in Google Search

### Title Links

- The title link is the headline in search results. It helps users decide which result to click.
- Google uses `<title>` element, headings, `og:title`, and other prominent text to generate title links.
- Best practices:
  - Ensure every page has a `<title>` element.
  - Write descriptive, concise titles. Avoid vague descriptors like "Home".
  - Avoid keyword stuffing in titles.
  - Avoid repeated boilerplate text across pages.
  - Brand titles concisely. Include site name at beginning or end with a delimiter.
  - Make the main title visually prominent (larger font, first visible `<h1>`).
  - Use the same language in `<title>` as the primary page content.

### Snippets

- The snippet is the description below the title link in search results.
- Snippets are sourced from the actual page content.
- Occasionally snippets come from the meta description tag.
- A good meta description is short, unique to one page, and includes the most relevant points.

Sources: https://developers.google.com/search/docs/appearance/title-link

## Add Images and Optimize Them

- Many people search visually. Images can be how people find your site.
- Add high-quality images near relevant text. The surrounding text helps Google understand the image.
- Add descriptive alt text. It explains the relationship between the image and your content.
- Use the `alt` attribute on `<img>` elements.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Optimize Videos

- Create high-quality video content and embed it on standalone pages near relevant text.
- Write descriptive titles and descriptions for videos.
- Apply title best practices to video titles too.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Promote Your Website

Effective promotion leads to faster discovery by interested people and search engines:

- Social media promotion
- Community engagement
- Online and offline advertisement
- Word of mouth (most effective and lasting)
- Include your URL on business cards, letterhead, posters
- Send newsletters about new content

Warning: Over-promotion can harm your site. People may get fatigued, and search engines may perceive some practices as manipulation.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Things You Should NOT Focus On

Google explicitly says these are not important for ranking:

| Myth | Reality |
|---|---|
| Meta keywords | Google does not use the keywords meta tag. |
| Keyword stuffing | Excessively repeating words is against spam policies and hurts users. |
| Keywords in domain name or URL path | Domain keywords have almost no ranking effect beyond breadcrumbs. |
| TLD choice (.com vs .org vs .guru) | Only matters if targeting a specific country. Otherwise Google does not care. |
| Minimum or maximum content length | No magical word count target. Write naturally. |
| Subdomains vs subdirectories | Do what makes business sense. |
| PageRank | Just one of many ranking signals. |
| Duplicate content "penalty" | Duplicate content is inefficient but not a manual action. |
| Number and order of headings | Semantic order helps screen readers, but Google does not penalize out-of-order headings. |
| E-E-A-T as a ranking factor | E-E-A-T is not a direct ranking factor. |

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Next Steps

- Set up Google Search Console to monitor performance.
- Add structured data to enable rich results (review stars, carousels, etc.).
- Stay informed via the Google Search Central blog, LinkedIn, X, and YouTube channel.

Sources: https://developers.google.com/search/docs/fundamentals/seo-starter-guide

## Sources

- https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- https://developers.google.com/search/docs/appearance/title-link
- https://developers.google.com/search/docs/appearance/snippet
