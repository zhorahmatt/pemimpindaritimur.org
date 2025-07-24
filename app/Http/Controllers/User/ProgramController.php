<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::find(1);

        $programs = Program::when(request()->q, function ($programs) {
            $programs = $programs->where('title', 'like', '%' . request()->q . '%');
        })->where('status', 'published')->orderByDesc('is_featured')->latest()->paginate(12);

        $programs->appends(['q' => request()->q]);

        return inertia('User/Programs/Index', [
            'profile' => $profile,
            'programs' => $programs,
        ]);
    }

    public function show($slug)
    {
        $profile = Profile::find(1);

        $program = Program::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        if ($this->isCrawler()) {
            return view('og.program', compact('program'));
        }

        return inertia('User/Programs/Show', [
            'profile' => $profile,
            'program' => $program,
        ]);
    }

    private function isCrawler()
    {
        $agent = request()->header('User-Agent');
        return preg_match('/facebook|twitter|linkedin|whatsapp|discordbot|telegrambot|bot|crawler|spider/i', $agent);
    }
}
