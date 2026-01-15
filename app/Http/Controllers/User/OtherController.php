<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\IlmuKeuangan;
use App\Models\Minaut;
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
            'name' => 'required',
            'email' => 'required|unique:ilmu_keuangans,email',
            'whatsapp' => 'required',
            'city' => 'required',
            'size' => 'required',
            'business_name' => 'required',
            'business_field' => 'required',
            'position' => 'required',
            'problem' => 'required',
            'hope' => 'required',
            'from' => 'required',
            // 'image'          => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'email.unique' => 'Email yang Anda masukkan telah terdaftar.',
            // 'image.required' => 'Bukti transfer tidak boleh kosong.',
            // 'image.image'    => 'Bukti transfer harus berupa file gambar.',
            // 'image.mimes'    => 'Bukti transfer harus berekstensi jpg, jpeg, atau png.',
            // 'image.max'      => 'Ukuran bukti transfer maksimal 10MB.',
        ]);

        // $path_image = $request->file('image')->store('others', 'public');

        IlmuKeuangan::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'city' => $request->city,
            'size' => $request->size,
            'business_name' => $request->business_name,
            'business_field' => $request->business_field,
            'position' => $request->position,
            'problem' => $request->problem,
            'hope' => $request->hope,
            'from' => $request->from,
            // 'image'          => $path_image,
        ]);

        return redirect()->route('user.other');
    }

    public function show()
    {
        $query_q = request()->q;
        $query_status = request()->status;

        $datas = IlmuKeuangan::when($query_q, function ($datas) use ($query_q) {
            $datas->where('name', 'like', '%' . $query_q . '%');
        })
            ->when($query_status, function ($datas) use ($query_status) {
                if ($query_status !== 'all') {
                    $datas->where('status', $query_status);
                }
            })
            ->latest()->paginate(100);

        $datas->appends([
            'q' => $query_q,
            'status' => $query_status
        ]);

        $total_all = IlmuKeuangan::count();
        $total_deny = IlmuKeuangan::where('status', 'deny')->count();
        $total_pending = IlmuKeuangan::where('status', 'pending')->count();
        $total_accept = IlmuKeuangan::where('status', 'accept')->count();

        return inertia('User/Others/Show', [
            'datas' => $datas,
            'total_all' => $total_all,
            'total_deny' => $total_deny,
            'total_pending' => $total_pending,
            'total_accept' => $total_accept,
            'current_status' => $query_status ?? 'all',
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

    public function getMinaut()
    {
        return inertia('User/Others/Minaut/Index', []);
    }

    public function registNewMinaut(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:ilmu_keuangans,email',
            'whatsapp' => 'required',
            'city' => 'required',
            'size' => 'required',
            'business_name' => 'required',
            'business_field' => 'required',
            'position' => 'required',
            'problem' => 'required',
            'hope' => 'required',
            'from' => 'required',
            // 'image'          => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'email.unique' => 'Email yang Anda masukkan telah terdaftar.',
            // 'image.required' => 'Bukti transfer tidak boleh kosong.',
            // 'image.image'    => 'Bukti transfer harus berupa file gambar.',
            // 'image.mimes'    => 'Bukti transfer harus berekstensi jpg, jpeg, atau png.',
            // 'image.max'      => 'Ukuran bukti transfer maksimal 10MB.',
        ]);

        // $path_image = $request->file('image')->store('others', 'public');

        Minaut::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'city' => $request->city,
            'size' => $request->size,
            'business_name' => $request->business_name,
            'business_field' => $request->business_field,
            'position' => $request->position,
            'problem' => $request->problem,
            'hope' => $request->hope,
            'from' => $request->from,
            // 'image'          => $path_image,
        ]);

        return redirect()->route('minaut.index');
    }
}
