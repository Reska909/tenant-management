<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArchiveController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST ARSIP
    |--------------------------------------------------------------------------
    */

public function index()
{
    $archives = Archive::with([
        'contract.tenant'
    ])

    ->where('deleted', false)

    ->when(request('search'), function ($query) {

    $query->where(function ($q) {

        // Cari berdasarkan lokasi arsip
        $q->where('lokasi_ruangan', 'like', '%' . request('search') . '%')
          ->orWhere('rak', 'like', '%' . request('search') . '%')

          // Cari berdasarkan data kontrak
          ->orWhereHas('contract', function ($contract) {

              $contract->where('nomor_kontrak', 'like', '%' . request('search') . '%')
                       ->orWhere('judul_kontrak', 'like', '%' . request('search') . '%')
                       ->orWhereHas('tenant', function ($tenant) {

                           $tenant->where(
                               'nama_tenant',
                               'like',
                               '%' . request('search') . '%'
                           );

                       });

          });

    });

})

    ->latest('archived_at')

    ->paginate(10)

    ->withQueryString();

    $totalArchive = Archive::where('deleted', false)->count();

    return view(
        'archive.index',
        compact(
            'archives',
            'totalArchive'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | ARSIPKAN CONTRACT
    |--------------------------------------------------------------------------
    */

    public function archive(Request $request, Contract $contract)
    {
        if ($contract->archive) {

            return back()->with(
                'error',
                'Kontrak sudah berada di arsip.'
            );

        }

    $request->validate([

        'alasan' => 'required',

        'lokasi_ruangan' => 'required|max:100',

        'rak' => 'required|max:50'

    ]);

    Archive::create([

        'contract_id' => $contract->id,

        'alasan' => $request->alasan,

        'lokasi_ruangan' => $request->lokasi_ruangan,

        'rak' => $request->rak,

        'archived_at' => now()

    ]);

        return redirect()
            ->route('contracts.index')
            ->with(
                'success',
                'Kontrak berhasil diarsipkan.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | RESTORE
    |--------------------------------------------------------------------------
    */

    public function restore(Archive $archive)
    {
        $archive->delete();

        return redirect()
            ->route('archives.index')
            ->with(
                'success',
                'Kontrak berhasil direstore.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS PERMANEN
    |--------------------------------------------------------------------------
    */

   public function destroy(Request $request, Archive $archive)
    {
        if(!Hash::check($request->password,Auth::user()->password)){

            return back()->with(

                'error',

                'Password salah.'

            );

        }

        $archive->update([

            'deleted'=>true

        ]);

        return back()->with(

            'success',

            'Arsip berhasil dipindahkan ke Recycle Bin.'

        );
    }
}