<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::when(request()->q, function ($partners) {
            $partners = $partners->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(10);

        $partners->appends(['q' => request()->q]);

        return inertia('Admin/Partners/Index', [
            'partners' => $partners,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'link' => 'required',
        ], [
            'logo.image' => 'Logo partner harus berupa file gambar.',
            'logo.mimes' => 'Logo harus berekstensi jpg, jpeg, atau png.',
            'logo.max'   => 'Ukuran logo maksimal 10MB.',
        ]);

        $path_logo = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $path_logo,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.partners.index');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'link' => 'required',
        ], [
            'logo.image' => 'Logo partner harus berupa file gambar.',
            'logo.mimes' => 'Logo harus berekstensi jpg, jpeg, atau png.',
            'logo.max'   => 'Ukuran logo maksimal 10MB.',
        ]);

        $path_logo = $partner->logo;
        if ($request->hasFile('logo')) {
            if ($path_logo && Storage::disk('public')->exists($path_logo)) {
                Storage::disk('public')->delete($path_logo);
            }

            $path_logo = $request->file('logo')->store('partners', 'public');
        }

        $partner->update([
            'name' => $request->name,
            'logo' => $path_logo,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.partners.index');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index');
    }
}
