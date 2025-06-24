<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::when(request()->q, function ($blogs) {
            $blogs = $blogs->where('title', 'like', '%' . request()->q . '%');
        })->orderByDesc('is_featured')->latest()->paginate(10);

        $blogs->appends(['q' => request()->q]);

        return inertia('Admin/Blogs/Index', [
            'blogs' => $blogs,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Blogs/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'category'    => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'content'     => 'required',
            'status'      => 'required',
            'is_featured' => 'required',
        ], [
            'content.required' => 'Konten tidak boleh kosong.',
            'status.required'  => 'Status tidak boleh kosong.',
            'image.required'   => 'Gambar tidak boleh kosong.',
            'image.image' => 'Gambar blog harus berupa file gambar.',
            'image.mimes' => 'Gambar blog harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar blog maksimal 10MB.',
        ]);

        $path_image = $request->file('image')->store('blogs', 'public');

        Blog::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'category'    => $request->category,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.blogs.index');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->image_name = basename($blog->image);
        $blog->image_size = Storage::disk('public')->size($blog->image);

        return inertia('Admin/Blogs/Edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'category'    => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'content'     => 'required',
            'status'      => 'required',
            'is_featured' => 'required',
        ], [
            'content.required' => 'Konten tidak boleh kosong.',
            'status.required'  => 'Status tidak boleh kosong.',
            'image.image' => 'Gambar blog harus berupa file gambar.',
            'image.mimes' => 'Gambar blog harus berekstensi jpg, jpeg, atau png.',
            'image.max'   => 'Ukuran gambar blog maksimal 10MB.',
        ]);

        $path_image = $blog->image;
        if ($request->hasFile('image')) {
            if ($path_image && Storage::disk('public')->exists($path_image)) {
                Storage::disk('public')->delete($path_image);
            }

            $path_image = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'category'    => $request->category,
            'image'       => $path_image,
            'content'     => $request->content,
            'status'      => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        return redirect()->route('admin.blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }
}
