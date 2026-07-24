<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Contract;
use App\Models\Tenant;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContractController extends Controller
{
    public function index()
    {
$contracts = Contract::with('tenant')

    ->where('deleted', false)

    ->doesntHave('archive')

    ->when(request('status'),function($query){

    if(request('status')=="aktif"){

        $query->whereDate('selesai','>',now()->addDays(30));

    }

    if(request('status')=="warning"){

        $query->whereBetween('selesai',[

            now(),

            now()->addDays(30)

        ]);

    }

    if(request('status')=="expired"){

        $query->whereDate('selesai','<',now());

    }

})

    ->when(request('search'), function($query){

        $query->where(function($q){

            $q->where('nomor_kontrak','like','%'.request('search').'%')

            ->orWhere('judul_kontrak','like','%'.request('search').'%')

            ->orWhereHas('tenant',function($tenant){

                $tenant->where('nama_tenant','like','%'.request('search').'%');

            });

        });

    })

    ->latest()

    ->paginate(10)

    ->withQueryString();

        $tenants = Tenant::where('deleted', false)
            ->orderBy('nama_tenant')
            ->get();

        $totalContract = Contract::where('deleted', false)

            ->doesntHave('archive')

            ->count();

        $aktif = Contract::where('deleted', false)

            ->doesntHave('archive')
            ->whereDate('selesai', '>', now()->addDays(30))
            ->count();

        $warning = Contract::where('deleted', false)

            ->doesntHave('archive')
            ->whereBetween('selesai', [
                now(),
                now()->addDays(30)
            ])
            ->count();

        $expired = Contract::where('deleted', false)

            ->doesntHave('archive')
            ->whereDate('selesai', '<', now())
            ->count();

        $reminderContracts = Contract::with('tenant')

            ->where('deleted', false)

            ->doesntHave('archive')

            ->whereDate('selesai', '>=', now())

            ->whereDate('selesai', '<=', now()->addDays(30))

            ->orderBy('selesai')

            ->take(5)

            ->get();

        $recentContracts = Contract::with('tenant')

            ->where('deleted',false)

            ->doesntHave('archive')

            ->latest()

            ->take(5)

            ->get();

        return view('contract.index', compact(

            'contracts',

            'tenants',

            'totalContract',

            'aktif',

            'warning',

            'expired',

            'reminderContracts',

            'recentContracts'

        ));
    }

    public function preview(Contract $contract)
{

    return response()->file(

        storage_path(

            'app/public/'.$contract->file_kontrak

        )

    );

}

    public function download(Contract $contract)
{

    return Storage::disk('public')

        ->download(

            $contract->file_kontrak

        );

}

    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'nomor_kontrak' => 'required',
            'judul_kontrak' => 'required',
            'tanggal_kontrak' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'file_kontrak' => 'nullable|mimes:pdf|max:5120'
        ]);

        $file = null;

        if($request->hasFile('file_kontrak')){
            $file = $request->file('file_kontrak')
                ->store('contracts','public');
        }

        Contract::create([
            'tenant_id'=>$request->tenant_id,
            'nomor_kontrak'=>$request->nomor_kontrak,
            'judul_kontrak'=>$request->judul_kontrak,
            'tanggal_kontrak'=>$request->tanggal_kontrak,
            'mulai'=>$request->mulai,
            'selesai'=>$request->selesai,
            'nilai_kontrak'=>$request->nilai_kontrak,
            'file_kontrak'=>$file,
            'status'=>'Aktif',
            'keterangan'=>$request->keterangan,
            'deleted'=>false
        ]);

        return redirect()->route('contracts.index')
            ->with('success','Kontrak berhasil ditambahkan.');
    }

    public function show(Contract $contract)
    {
        return response()->json([

            'id' => $contract->id,

            'tenant_id' => $contract->tenant_id,

            'nomor_kontrak' => $contract->nomor_kontrak,

            'judul_kontrak' => $contract->judul_kontrak,

            'tanggal_kontrak' => $contract->tanggal_kontrak,

            'mulai' => $contract->mulai,

            'selesai' => $contract->selesai,

            'nilai_kontrak' => $contract->nilai_kontrak,

            'keterangan' => $contract->keterangan,

            'file_kontrak' => $contract->file_kontrak,

        ]);
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'tenant_id'=>'required',
            'nomor_kontrak'=>'required',
            'judul_kontrak'=>'required'
        ]);

        $file = $contract->file_kontrak;

        if($request->hasFile('file_kontrak')){

            if($file){
                Storage::disk('public')->delete($file);
            }

            $file = $request->file('file_kontrak')
                ->store('contracts','public');
        }

        $contract->update([

            'tenant_id'=>$request->tenant_id,
            'nomor_kontrak'=>$request->nomor_kontrak,
            'judul_kontrak'=>$request->judul_kontrak,
            'tanggal_kontrak'=>$request->tanggal_kontrak,
            'mulai'=>$request->mulai,
            'selesai'=>$request->selesai,
            'nilai_kontrak'=>$request->nilai_kontrak,
            'file_kontrak'=>$file,
            'keterangan'=>$request->keterangan

        ]);

        return redirect()->route('contracts.index')
            ->with('success','Kontrak berhasil diperbarui.');
    }

    public function destroy(Request $request, Contract $contract)
    {
        if(!Hash::check($request->password, Auth::user()->password)){

            return back()->with(

                'error',

                'Password salah.'

            );

        }

        $contract->update([

            'deleted'=>true

        ]);

        return back()->with(

            'success',

            'Kontrak berhasil dipindahkan ke Recycle Bin.'

        );
    }

    public function exportPDF()
    {
    $contracts = Contract::with('tenant')
        ->where('deleted', false)
        ->orderBy('tenant_id')
        ->get();

    $pdf = Pdf::loadView(
        'contract.pdf',
        compact('contracts')
    );

    return $pdf->download('Daftar-Kontrak.pdf');
    }
}