<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Basic Meta Tags -->
    <title>{{ $program->title }} - GLP INDTIM</title>
    <meta name="description" content="{{ Str::limit(strip_tags($program->content), 160) }}">
    
    <!-- Open Graph Meta Tags for Facebook, WhatsApp, etc. -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $program->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($program->content), 160) }}">
    <meta property="og:image" content="{{ url('storage/' . $program->image) }}">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="800">
    <meta property="og:url" content="{{ url('/programs/' . $program->slug) }}">
    <meta property="og:site_name" content="GLP INDTIM">
    <meta property="article:author" content="GLP INDTIM">
    <meta property="article:published_time" content="{{ $program->created_at->toISOString() }}">
    <meta property="article:section" content="{{ $program->category }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $program->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($program->content), 160) }}">
    <meta name="twitter:image" content="{{ url('storage/' . $program->image) }}">
    
    <!-- Additional Meta Tags -->
    <meta name="author" content="GLP INDTIM">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/programs/' . $program->slug) }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/media/logos/glp-indtim-logo.png') }}" type="image/png">
    
    <!-- Redirect to actual program page after a short delay -->
    <meta http-equiv="refresh" content="0;url={{ url('/programs/' . $program->slug) }}">
</head>
<body>
    <!-- Fallback content for crawlers that don't follow redirects -->
    <h1>{{ $program->title }}</h1>
    <img src="{{ url('storage/' . $program->image) }}" alt="{{ $program->title }}" style="max-width: 100%; height: auto;">
    <p>{{ Str::limit(strip_tags($program->content), 300) }}</p>
    <p><strong>Category:</strong> {{ $program->category }}</p>
    <p><strong>Published:</strong> {{ $program->created_at->format('F j, Y') }}</p>
    <a href="{{ url('/programs/' . $program->slug) }}">Read full article</a>
</body>
</html>