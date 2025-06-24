<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::when(request()->q, function ($activities) {
            $activities = $activities->where('title', 'like', '%' . request()->q . '%');
        })->orderByDesc('is_featured')->latest()->paginate(10);

        $activities->appends(['q' => request()->q]);

        return inertia('Admin/Activities/Index', [
            'activities' => $activities,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Activities/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'phase'       => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'content'     => 'required',
            'status'      => 'required',
            'is_featured' => 'required',
        ], [
            'content.required' => 'Konten tidak boleh kosong.',
            'status.required'  => 'Status tidak boleh kosong.',
            'image.required'   => 'Gambar tidak boleh kosong.',
            'image.image' => 'Gambar kegiatan harus berupa file gambar.',
            'image.mimes' => 'Gambar kegiatan harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar kegiatan maksimal 10MB.',
        ]);

        $path_image = $request->file('image')->store('activities', 'public');

        Activity::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'phase'       => $request->phase,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.activities.index');
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->image_name = basename($activity->image);
        $activity->image_size = Storage::disk('public')->size($activity->image);

        return inertia('Admin/Activities/Edit', [
            'activity' => $activity,
        ]);
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'phase'       => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'content'     => 'required',
            'status'      => 'required',
            'is_featured' => 'required',
        ], [
            'content.required' => 'Konten tidak boleh kosong.',
            'status.required'  => 'Status tidak boleh kosong.',
            'image.image' => 'Gambar kegiatan harus berupa file gambar.',
            'image.mimes' => 'Gambar kegiatan harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar kegiatan maksimal 10MB.',
        ]);

        $path_image = $activity->image;
        if ($request->hasFile('image')) {
            if ($path_image && Storage::disk('public')->exists($path_image)) {
                Storage::disk('public')->delete($path_image);
            }

            $path_image = $request->file('image')->store('activities', 'public');
        }

        $activity->update([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'phase'       => $request->phase,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.activities.index');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image && Storage::disk('public')->exists($activity->image)) {
            Storage::disk('public')->delete($activity->image);
        }

        $activity->delete();

        return redirect()->route('admin.activities.index');
    }
}
