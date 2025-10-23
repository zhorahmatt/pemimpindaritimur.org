<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\IlmuKeuangan;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function __invoke()
    {
        return inertia('User/Others/Index', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'email'          => 'required|unique:ilmu_keuangans,email',
            'whatsapp'       => 'required',
            'city'           => 'required',
            'size'           => 'required',
            'business_name'  => 'required',
            'business_field' => 'required',
            'position'       => 'required',
            'problem'        => 'required',
            'hope'           => 'required',
            'from'           => 'required',
            'image'          => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'email.unique'   => 'Email yang Anda masukkan telah terdaftar.',
            'image.required' => 'Bukti transfer tidak boleh kosong.',
            'image.image'    => 'Bukti transfer blog harus berupa file gambar.',
            'image.mimes'    => 'Bukti transfer harus berekstensi jpg, jpeg, atau png.',
            'image.max'      => 'Ukuran bukti transfer maksimal 10MB.',
        ]);

        $path_image = $request->file('image')->store('others', 'public');

        IlmuKeuangan::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'whatsapp'       => $request->whatsapp,
            'city'           => $request->city,
            'size'           => $request->size,
            'business_name'  => $request->business_name,
            'business_field' => $request->business_field,
            'position'       => $request->position,
            'problem'        => $request->problem,
            'hope'           => $request->hope,
            'from'           => $request->from,
            'image'          => $path_image,
        ]);

        return redirect()->route('user.other');
    }
}
