<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Profile;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::find(1);

        $activities = Activity::when(request()->q, function ($activities) {
            $activities = $activities->where('title', 'like', '%' . request()->q . '%');
        })->where('status', 'published')->orderByDesc('is_featured')->latest()->paginate(12);

        $activities->appends(['q' => request()->q]);

        return inertia('User/Activities/Index', [
            'profile' => $profile,
            'activities' => $activities,
        ]);
    }

    public function show($slug)
    {
        $profile = Profile::find(1);

        $activity = Activity::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        if ($this->isCrawler()) {
            return view('og.activity', compact('activity'));
        }

        return inertia('User/Activities/Show', [
            'profile' => $profile,
            'activity' => $activity,
        ]);
    }

    private function isCrawler()
    {
        $agent = request()->header('User-Agent');
        return preg_match('/facebook|twitter|linkedin|whatsapp|discordbot|telegrambot|bot|crawler|spider/i', $agent);
    }
}
