<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Program;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $activities = Activity::where('status', 'published')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(6)
            ->get();

        $programs = Program::where('status', 'published')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(6)
            ->get();

        $blogs = Blog::where('status', 'published')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(3)
            ->get();

        return inertia('User/Home/Index', [
            'activities' => $activities,
            'programs' => $programs,
            'blogs' => $blogs,
        ]);
    }
}
