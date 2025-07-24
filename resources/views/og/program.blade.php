<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="GLP INDTIM">
</head>
<body>
    <script>window.location.href = "{{ route('user.blog.show', $blog->slug) }}";</script>
</body>
</html>
