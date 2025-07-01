<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Profile;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::find(1);
        $galleries = Gallery::latest()->get();

        return inertia('User/Galleries/Index', [
            'profile' => $profile,
            'galleries' => $galleries,
        ]);
    }
}
