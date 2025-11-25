<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\IlmuKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            // 'image'          => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'email.unique'   => 'Email yang Anda masukkan telah terdaftar.',
            // 'image.required' => 'Bukti transfer tidak boleh kosong.',
            // 'image.image'    => 'Bukti transfer harus berupa file gambar.',
            // 'image.mimes'    => 'Bukti transfer harus berekstensi jpg, jpeg, atau png.',
            // 'image.max'      => 'Ukuran bukti transfer maksimal 10MB.',
        ]);

        // $path_image = $request->file('image')->store('others', 'public');

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
            // 'image'          => $path_image,
        ]);

        return redirect()->route('user.other');
    }

    public function show()
    {
        $datas = IlmuKeuangan::when(request()->q, function ($datas) {
            $datas->where('name', 'like', '%' . request()->q . '%');
        })
            ->orderByRaw("FIELD(status, 'pending', 'accept', 'deny')")
            ->paginate(100);

        $datas->appends(['q' => request()->q]);

        $total_all     = IlmuKeuangan::count();
        $total_deny    = IlmuKeuangan::where('status', 'deny')->count();
        $total_pending = IlmuKeuangan::where('status', 'pending')->count();
        $total_accept  = IlmuKeuangan::where('status', 'accept')->count();

        return inertia('User/Others/Show', [
            'datas'         => $datas,
            'total_all'     => $total_all,
            'total_deny'    => $total_deny,
            'total_pending' => $total_pending,
            'total_accept'  => $total_accept,
        ]);
    }

    public function update(Request $request, IlmuKeuangan $data)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $data->update([
            'status' => $request->status,
        ]);

        return redirect()->route('user.other.show');
    }

    public function destroy($id)
    {
        $data = IlmuKeuangan::findOrFail($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('user.other.show');
    }
}
