<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::when(request()->q, function ($programs) {
            $programs = $programs->where('title', 'like', '%' . request()->q . '%');
        })->orderByDesc('is_featured')->latest()->paginate(10);

        $programs->appends(['q' => request()->q]);

        return inertia('Admin/Programs/Index', [
            'programs' => $programs,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Programs/Create');
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
            'image.image' => 'Gambar program harus berupa file gambar.',
            'image.mimes' => 'Gambar program harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar program maksimal 10MB.',
        ]);

        $path_image = $request->file('image')->store('programs', 'public');

        Program::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'phase'       => $request->phase,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.programs.index');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $program->image_name = basename($program->image);
        $program->image_size = Storage::disk('public')->size($program->image);

        return inertia('Admin/Programs/Edit', [
            'program' => $program,
        ]);
    }

    public function update(Request $request, Program $program)
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
            'image.image' => 'Gambar program harus berupa file gambar.',
            'image.mimes' => 'Gambar program harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar program maksimal 10MB.',
        ]);

        $path_image = $program->image;
        if ($request->hasFile('image')) {
            if ($path_image && Storage::disk('public')->exists($path_image)) {
                Storage::disk('public')->delete($path_image);
            }

            $path_image = $request->file('image')->store('programs', 'public');
        }

        $program->update([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'phase'       => $request->phase,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.programs.index');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->image && Storage::disk('public')->exists($program->image)) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()->route('admin.programs.index');
    }
}
