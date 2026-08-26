<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SyncHpiRegistrationToGoogleSheet;
use App\Models\Hpi;
use App\Models\IlmuKeuangan;
use App\Models\Minaut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtherController extends Controller
{
    private const HPI_REGISTRATION_LIMIT = 48;

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
            $datas->where('name', 'like', '%'.$query_q.'%');
        })
            ->when($query_status, function ($datas) use ($query_status) {
                if ($query_status !== 'all') {
                    $datas->where('status', $query_status);
                }
            })
            ->latest()->paginate(100);

        $datas->appends([
            'q' => $query_q,
            'status' => $query_status,
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
        $registrationLimit = 30;
        $currentRegistrations = Minaut::count();
        $remainingSlots = max(0, $registrationLimit - $currentRegistrations);
        $isRegistrationOpen = $currentRegistrations < $registrationLimit;

        return inertia('User/Others/Minaut/Index', [
            'registration_limit' => $registrationLimit,
            'current_registrations' => $currentRegistrations,
            'remaining_slots' => $remainingSlots,
            'is_registration_open' => $isRegistrationOpen,
        ]);
    }

    public function registNewMinaut(Request $request)
    {
        // Check registration limit
        $registrationLimit = 30;
        $currentRegistrations = Minaut::count();

        if ($currentRegistrations >= $registrationLimit) {
            return back()->withErrors([
                'limit' => 'Mohon maaf, kuota pendaftaran sudah penuh (30 peserta). Silakan hubungi admin untuk informasi lebih lanjut.',
            ]);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:minauts,email',
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

    public function showDashboardMinaut()
    {
        $query_q = request()->q;
        $query_status = request()->status;

        $datas = Minaut::when($query_q, function ($datas) use ($query_q) {
            $datas->where('name', 'like', '%'.$query_q.'%');
        })
            ->when($query_status, function ($datas) use ($query_status) {
                if ($query_status !== 'all') {
                    $datas->where('status', $query_status);
                }
            })
            ->latest()->paginate(100);

        $datas->appends([
            'q' => $query_q,
            'status' => $query_status,
        ]);

        $total_all = Minaut::count();
        $total_deny = Minaut::where('status', 'deny')->count();
        $total_pending = Minaut::where('status', 'pending')->count();
        $total_accept = Minaut::where('status', 'accept')->count();

        return inertia('User/Others/Minaut/Show', [
            'datas' => $datas,
            'total_all' => $total_all,
            'total_deny' => $total_deny,
            'total_pending' => $total_pending,
            'total_accept' => $total_accept,
            'current_status' => $query_status ?? 'all',
        ]);
    }

    public function updateDashboardMinaut(Request $request, Minaut $data)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $data->update([
            'status' => $request->status,
        ]);

        return redirect()->route('minaut.show');
    }

    public function destroyDashboardMinaut($id)
    {
        $data = Minaut::findOrFail($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('minaut.show');
    }

    public function getHpi()
    {
        $registrationLimit = self::HPI_REGISTRATION_LIMIT;
        $currentRegistrations = Hpi::count();
        $remainingSlots = max(0, $registrationLimit - $currentRegistrations);
        $isRegistrationOpen = $currentRegistrations < $registrationLimit;

        return inertia('User/Others/Hpi/Index', [
            'registration_limit' => $registrationLimit,
            'current_registrations' => $currentRegistrations,
            'remaining_slots' => $remainingSlots,
            'is_registration_open' => $isRegistrationOpen,
        ]);
    }

    public function registNewHpi(Request $request)
    {
        // Check registration limit
        $registrationLimit = self::HPI_REGISTRATION_LIMIT;
        $currentRegistrations = Hpi::count();

        if ($currentRegistrations >= $registrationLimit) {
            return back()->withErrors([
                'limit' => "Mohon maaf, kuota pendaftaran sudah penuh ({$registrationLimit} peserta). Silakan hubungi admin untuk informasi lebih lanjut.",
            ]);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:hpis,email',
            'whatsapp' => 'required',
            'city' => 'required',
            'size' => 'required',
            'business_name' => 'required',
            'business_field' => 'required',
            'position' => 'required',
            'problem' => 'required',
            'hope' => 'required',
            'from' => 'required',
            'asiaworks_joined' => 'required',
            'asiaworks_training' => 'nullable|required_if:asiaworks_joined,Ya',
        ], [
            'email.unique' => 'Email yang Anda masukkan telah terdaftar.',
            'asiaworks_joined.required' => 'Pilihan program pelatihan Asiaworks wajib dipilih.',
            'asiaworks_training.required_if' => 'Pilihan training yang diikuti wajib dipilih jika pernah mengikuti Asiaworks.',
        ]);

        $hpi = Hpi::create([
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
            'asiaworks_joined' => $request->asiaworks_joined,
            'asiaworks_training' => $request->asiaworks_joined === 'Ya' ? $request->asiaworks_training : null,
        ]);

        SyncHpiRegistrationToGoogleSheet::dispatch($hpi->id)->afterCommit();

        return redirect()->route('hpi.index');
    }

    public function showDashboardHpi()
    {
        $query_q = request()->q;
        $query_status = request()->status;

        $datas = Hpi::when($query_q, function ($datas) use ($query_q) {
            $datas->where('name', 'like', '%'.$query_q.'%');
        })
            ->when($query_status, function ($datas) use ($query_status) {
                if ($query_status !== 'all') {
                    $datas->where('status', $query_status);
                }
            })
            ->latest()->paginate(100);

        $datas->appends([
            'q' => $query_q,
            'status' => $query_status,
        ]);

        $total_all = Hpi::count();
        $total_deny = Hpi::where('status', 'deny')->count();
        $total_pending = Hpi::where('status', 'pending')->count();
        $total_accept = Hpi::where('status', 'accept')->count();

        return inertia('User/Others/Hpi/Show', [
            'datas' => $datas,
            'total_all' => $total_all,
            'total_deny' => $total_deny,
            'total_pending' => $total_pending,
            'total_accept' => $total_accept,
            'current_status' => $query_status ?? 'all',
        ]);
    }

    public function updateDashboardHpi(Request $request, Hpi $data)
    {
        $validated = $request->validate([
            'status' => 'required',
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:hpis,email,'.$data->id,
            'whatsapp' => 'sometimes|required',
            'city' => 'sometimes|required',
            'size' => 'sometimes|required',
            'business_name' => 'sometimes|required',
            'business_field' => 'sometimes|required',
            'position' => 'sometimes|required',
            'problem' => 'sometimes|required',
            'hope' => 'sometimes|required',
            'from' => 'sometimes|required',
            'asiaworks_joined' => 'nullable',
            'asiaworks_training' => 'nullable',
        ]);

        if ($request->has('asiaworks_joined') && $request->asiaworks_joined !== 'Ya') {
            $validated['asiaworks_training'] = null;
        }

        $data->update($validated);

        return redirect()->route('hpi.show');
    }

    public function destroyDashboardHpi($id)
    {
        $data = Hpi::findOrFail($id);

        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('hpi.show');
    }
}
