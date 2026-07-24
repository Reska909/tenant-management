<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $tenants = Tenant::where('deleted', false)

            ->when($keyword, function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('nama_tenant', 'like', "%{$keyword}%")
                      ->orWhere('nama_pic', 'like', "%{$keyword}%")
                      ->orWhere('no_hp_pic', 'like', "%{$keyword}%")
                      ->orWhere('instansi', 'like', "%{$keyword}%")
                      ->orWhere('nomor_kontrak', 'like', "%{$keyword}%")
                      ->orWhere('lokasi_ruangan', 'like', "%{$keyword}%")
                      ->orWhere('lemari', 'like', "%{$keyword}%")
                      ->orWhere('rak', 'like', "%{$keyword}%");

                });

            })

            ->orderByDesc('id')

            ->get();

        return view('tenant.index', compact('tenants', 'keyword'));
    }

public function store(Request $request)
{
    $this->ensureAdmin();

    $request->validate([
        'nama_tenant'      => 'required',
        'nama_pic'         => 'required',
        'no_hp_pic'        => 'required',
        'instansi'         => 'required',
        'jenis_layanan'    => 'required',
        'status_pks'       => 'required',
        'lokasi_ruangan'   => 'nullable|string|max:100',
        'rak'              => 'nullable|string|max:50'
    ]);

    if ($request->layanan == "VPS") {

    $request->merge([

        'lokasi_arsip' => '-'

    ]);

}

    if ($request->jenis_layanan == 'VPS') {

    $request->merge([

        'lokasi_ruangan' => '-',

        'rak' => '-',

    ]);

}

    Tenant::create([
        'nama_tenant'      => $request->nama_tenant,
        'nama_pic'         => $request->nama_pic,
        'no_hp_pic'        => $request->no_hp_pic,
        'instansi'         => $request->instansi,
        'jenis_layanan'    => $request->jenis_layanan,
        'status_pks'       => $request->status_pks,
        'lokasi_ruangan'   => $request->lokasi_ruangan,
        'rak'              => $request->rak,
        'nomor_kontrak'    => $request->nomor_kontrak,
        'tanggal_pks'      => $request->tanggal_pks,
        'masa_mulai'       => $request->masa_mulai,
        'masa_berakhir'    => $request->masa_berakhir,
        'arsip'            => false,
        'deleted'          => false,
    ]);

    return redirect()
        ->route('tenants.index')
        ->with('success','Tenant berhasil ditambahkan.');
}

    public function show(Tenant $tenant)
    {
        return response()->json($tenant);
    }

    public function update(Request $request, Tenant $tenant)
    {
        $this->ensureAdmin();
        $request->validate([
            'nama_tenant'      => 'required',
            'nama_pic'         => 'required',
            'no_hp_pic'        => 'required',
            'instansi'         => 'required',
            'jenis_layanan'    =>'required',
            'status_pks'       => 'required',

            'lokasi_ruangan'   => 'nullable|string|max:100',
            'rak'              => 'nullable|string|max:50'
        ]);

        if ($request->layanan == "VPS") {

    $request->merge([

        'lokasi_arsip' => '-'

    ]);

}

        if ($request->jenis_layanan == 'VPS') {

    $request->merge([

        'lokasi_ruangan' => '-',

        'rak' => '-',

    ]);

}

        $tenant->update([

            'nama_tenant'      => $request->nama_tenant,
            'nama_pic'         => $request->nama_pic,
            'no_hp_pic'        => $request->no_hp_pic,
            'instansi'         => $request->instansi,
            'jenis_layanan' => $request->jenis_layanan,
            'status_pks'       => $request->status_pks,

            'nomor_kontrak'    => $request->nomor_kontrak,
            'tanggal_pks'      => $request->tanggal_pks,
            'masa_mulai'       => $request->masa_mulai,
            'masa_berakhir'    => $request->masa_berakhir,

            'lokasi_ruangan'   => $request->lokasi_ruangan,
            'rak'              => $request->rak

        ]);

        return redirect()
            ->route('tenants.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Request $request, Tenant $tenant)
{

    $this->ensureAdmin();

    if (!Hash::check($request->password, Auth::user()->password)) {


        return back()->with(
            'error',
            'Password yang Anda masukkan salah.'
        );

    }

    $tenant->update([
        'deleted' => true
    ]);

    return redirect()
        ->route('tenants.index')
        ->with(
            'success',
            'Tenant berhasil dipindahkan ke Recycle Bin.'
        );
    }

    /*
|--------------------------------------------------------------------------
| HELPER
|--------------------------------------------------------------------------
*/

private function ensureAdmin(): void
{
    abort_unless(auth()->user()->isAdmin(), 403);
}
}