{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Main sitemap with static pages -->
    <sitemap>
        <loc>{{ route('sitemap.main') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
    </sitemap>

    <!-- Search pages sitemap (specialty + city combinations) -->
    <sitemap>
        <loc>{{ route('sitemap.search') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
    </sitemap>

    <!-- Professionals sitemap -->
    <sitemap>
        <loc>{{ route('sitemap.professionals') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
    </sitemap>

    <!-- Blog posts sitemap -->
    <sitemap>
        <loc>{{ route('sitemap.posts') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
    </sitemap>

    <!-- Projects sitemap -->
    <sitemap>
        <loc>{{ route('sitemap.projects') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
    </sitemap>
</sitemapindex>
