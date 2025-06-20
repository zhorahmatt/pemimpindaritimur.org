<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::when(request()->q, function ($query) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . request()->q . '%')
                    ->orWhere('testimonial', 'like', '%' . request()->q . '%');
            });
        })->latest()->paginate(10);

        $testimonials->appends(['q' => request()->q]);

        return inertia('Admin/Testimonials/Index', [
            'testimonials' => $testimonials,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'title'       => 'required',
            'photo'       => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'testimonial' => 'required',
        ], [
            'photo.image' => 'Foto profil harus berupa file gambar.',
            'photo.mimes' => 'Foto profil harus berekstensi jpg, jpeg, atau png.',
            'photo.max'   => 'Ukuran foto profil maksimal 10MB.',
        ]);

        $path_photo = $request->file('photo')->store('testimonials', 'public');

        Testimonial::create([
            'name' => $request->name,
            'title' => $request->title,
            'photo' => $path_photo,
            'testimonial' => $request->testimonial,
        ]);

        return redirect()->route('admin.testimonials.index');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name'        => 'required',
            'title'       => 'required',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'testimonial' => 'required',
        ], [
            'photo.image' => 'Foto profil harus berupa file gambar.',
            'photo.mimes' => 'Foto profil harus berekstensi jpg, jpeg, atau png.',
            'photo.max'   => 'Ukuran foto profil maksimal 10MB.',
        ]);

        $path_photo = $testimonial->photo;
        if ($request->hasFile('photo')) {
            if ($path_photo && Storage::disk('public')->exists($path_photo)) {
                Storage::disk('public')->delete($path_photo);
            }

            $path_photo = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update([
            'name' => $request->name,
            'title' => $request->title,
            'photo' => $path_photo,
            'testimonial' => $request->testimonial,
        ]);

        return redirect()->route('admin.testimonials.index');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->photo && Storage::disk('public')->exists($testimonial->photo)) {
            Storage::disk('public')->delete($testimonial->photo);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index');
    }
}
