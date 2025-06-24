<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Blog;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $activities = Activity::count();
        $programs = Program::count();
        $blogs = Blog::count();

        return inertia('Admin/Dashboard/Index', [
            'activities' => $activities,
            'programs'   => $programs,
            'blogs'      => $blogs,
        ]);
    }
}
