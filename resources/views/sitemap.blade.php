<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
{{-- 
### TIMID0x - 2023-09-01T08:37:39.000-05:00
--}}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ Request::getSchemeAndHttpHost() }}</loc>
        <lastmod>{{ Carbon\Carbon::yesterday()->toW3cString()}}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ Request::getSchemeAndHttpHost() }}/tl50data</loc>
        <lastmod>{{ Carbon\Carbon::yesterday()->toW3cString()}}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ Request::getSchemeAndHttpHost() }}/blog</loc>
        <lastmod>{{ Carbon\Carbon::yesterday()->toW3cString()}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ Request::getSchemeAndHttpHost() }}/friendcode</loc>
        <lastmod>{{ Carbon\Carbon::yesterday()->toW3cString()}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.4</priority>
    </url>
    <url>
        <loc>{{ Request::getSchemeAndHttpHost() }}/shop</loc>
        <lastmod>{{ Carbon\Carbon::yesterday()->toW3cString()}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.3</priority>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>{{ Request::getSchemeAndHttpHost() }}/blog/{{ $post->slug }}</loc>
            <lastmod>{{ $post->updated_at->toW3cString()}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>





