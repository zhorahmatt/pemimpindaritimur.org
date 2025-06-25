<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Activity;
use App\Models\Program;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::find(1);

        $total_activities = Activity::where('status', 'published')->count();
        $activities = Activity::where('status', 'published')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(6)
            ->get();

        $total_programs = Program::where('status', 'published')->count();
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

        $partners = Partner::all();

        $testimonials = Testimonial::all();

        return inertia('User/Home/Index', [
            'profile' => $profile,
            'total_activities' => $total_activities,
            'activities' => $activities,
            'total_programs' => $total_programs,
            'programs' => $programs,
            'blogs' => $blogs,
            'partners' => $partners,
            'testimonials' => $testimonials,
        ]);
    }
}
