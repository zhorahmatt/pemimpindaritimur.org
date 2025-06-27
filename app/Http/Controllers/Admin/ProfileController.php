<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        $profile->image_name = basename($profile->logo);
        $profile->image_size = Storage::disk('public')->size($profile->logo);

        return inertia('Admin/Profile/Index', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name'         => 'required',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'tagline'      => 'required',
            'year'         => 'required',
            'members'      => 'required',
            'address'      => 'required',
            'bank_name'    => 'required',
            'bank_account' => 'required',
            'bank_number'  => 'required',
            'facebook'     => 'required',
            'instagram'    => 'required',
            'whatsapp'     => 'required',
            'email'        => 'required',
        ], [
            'logo.image'   => 'Logo harus berupa file gambar.',
            'logo.mimes'   => 'Logo harus berekstensi jpg, jpeg, atau png.',
            'logo.max'     => 'Ukuran logo maksimal 10MB.',
        ]);

        $path_logo = $profile->logo;
        if ($request->hasFile('logo')) {
            if ($path_logo && Storage::disk('public')->exists($path_logo)) {
                Storage::disk('public')->delete($path_logo);
            }

            $path_logo = $request->file('logo')->store('profile', 'public');
        }

        $profile->update([
            'name'         => $request->name,
            'logo'         => $path_logo,
            'tagline'      => $request->tagline,
            'year'         => $request->year,
            'members'      => $request->members,
            'address'      => $request->address,
            'bank_name'    => $request->bank_name,
            'bank_account' => $request->bank_account,
            'bank_number'  => $request->bank_number,
            'facebook'     => $request->facebook,
            'instagram'    => $request->instagram,
            'whatsapp'     => $request->whatsapp,
            'email'        => $request->email,
        ]);

        return redirect()->route('admin.profile.index');
    }
}
