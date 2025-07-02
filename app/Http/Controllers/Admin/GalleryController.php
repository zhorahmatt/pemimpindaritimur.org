<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return inertia('Admin/Galleries/Index', [
            'galleries' => $galleries,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'description' => 'nullable',
        ], [
            'image.image' => 'Gambar harus berupa file gambar.',
            'image.mimes' => 'Gambar harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar maksimal 10MB.',
        ]);

        $path_image = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'image'       => $path_image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.galleries.index');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'description' => 'nullable',
        ], [
            'image.image' => 'Gambar harus berupa file gambar.',
            'image.mimes' => 'Gambar harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar maksimal 10MB.',
        ]);

        $path_image = $gallery->image;
        if ($request->hasFile('image')) {
            if ($path_image && Storage::disk('public')->exists($path_image)) {
                Storage::disk('public')->delete($path_image);
            }

            $path_image = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update([
            'image'       => $path_image,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.galleries.index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index');
    }
}
