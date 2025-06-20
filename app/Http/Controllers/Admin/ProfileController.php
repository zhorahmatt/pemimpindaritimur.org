<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        return inertia('Admin/Profile/Index', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name'      => 'required',
            'tagline'   => 'required',
            'year'      => 'required',
            'members'   => 'required',
            'address'   => 'required',
            'facebook'  => 'required',
            'instagram' => 'required',
            'whatsapp'  => 'required',
            'email'     => 'required',
        ]);

        $profile->update([
            'name'      => $request->name,
            'tagline'   => $request->tagline,
            'year'      => $request->year,
            'members'   => $request->members,
            'address'   => $request->address,
            'facebook'  => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp'  => $request->whatsapp,
            'email'     => $request->email,
        ]);

        return redirect()->route('admin.profile.index');
    }
}
