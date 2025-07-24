<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Profile;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::find(1);

        $blogs = Blog::when(request()->q, function ($blogs) {
            $blogs = $blogs->where('title', 'like', '%' . request()->q . '%');
        })->where('status', 'published')->orderByDesc('is_featured')->latest()->paginate(10);

        $blogs->appends(['q' => request()->q]);

        return inertia('User/Blogs/Index', [
            'profile' => $profile,
            'blogs' => $blogs,
        ]);
    }

    public function show($slug)
    {
        $profile = Profile::find(1);

        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        if ($this->isCrawler()) {
            return view('og.blog', compact('blog'));
        }

        return inertia('User/Blogs/Show', [
            'profile' => $profile,
            'blog' => $blog,
        ]);
    }

    private function isCrawler()
    {
        $agent = request()->header('User-Agent');
        return preg_match('/facebook|twitter|linkedin|whatsapp|discordbot|telegrambot|bot|crawler|spider/i', $agent);
    }
}
