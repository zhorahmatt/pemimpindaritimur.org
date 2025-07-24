<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Basic Meta Tags -->
    <title>{{ $blog->title }} - GLP INDTIM</title>
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
    
    <!-- Open Graph Meta Tags for Facebook, WhatsApp, etc. -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:image" content="{{ url('storage/' . $blog->image) }}">
    {{-- <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="800"> --}}
    <meta property="og:url" content="{{ url('/blogs/' . $blog->slug) }}">
    <meta property="og:site_name" content="GLP INDTIM">
    <meta property="article:author" content="GLP INDTIM">
    <meta property="article:published_time" content="{{ $blog->created_at->toISOString() }}">
    <meta property="article:section" content="{{ $blog->category }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="twitter:image" content="{{ url('storage/' . $blog->image) }}">
    
    <!-- Additional Meta Tags -->
    <meta name="author" content="GLP INDTIM">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/blogs/' . $blog->slug) }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/media/logos/glp-indtim-logo.png') }}" type="image/png">
    
    <!-- Redirect to actual blog page after a short delay -->
    {{-- <meta http-equiv="refresh" content="0;url={{ url('/blogs/' . $blog->slug) }}"> --}}
</head>
<body>
    <!-- Fallback content for crawlers that don't follow redirects -->
    <h1>{{ $blog->title }}</h1>
    <img src="{{ url('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 100%; height: auto;">
    <p>{{ Str::limit(strip_tags($blog->content), 300) }}</p>
    <p><strong>Category:</strong> {{ $blog->category }}</p>
    <p><strong>Published:</strong> {{ $blog->created_at->format('F j, Y') }}</p>
    <a href="{{ url('/blogs/' . $blog->slug) }}">Read full article</a>
</body>
</html>