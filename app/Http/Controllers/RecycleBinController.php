<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Contract;
use App\Models\Archive;

class RecycleBinController extends Controller
{
    public function index()
    {
        $tenants = Tenant::where('deleted', true)
            ->latest()
            ->get();

        $contracts = Contract::with('tenant')
            ->where('deleted', true)
            ->latest()
            ->get();

        $archives = Archive::with('contract.tenant')
            ->where('deleted', true)
            ->latest()
            ->get();

        $totalTenant = $tenants->count();

        $totalContract = $contracts->count();

        $totalArchive = $archives->count();

        return view(
            'recycle-bin.index',
            compact(
                'tenants',
                'contracts',
                'archives',
                'totalTenant',
                'totalContract',
                'totalArchive'
            )
        );
    }

    public function restoreTenant(Tenant $tenant)
    {
        $tenant->update([
            'deleted' => false
        ]);

        return back()->with(
            'success',
            'Tenant berhasil direstore.'
        );
    }

    public function forceDeleteTenant(Tenant $tenant)
    {
        $tenant->delete();

        return back()->with(
            'success',
            'Tenant berhasil dihapus permanen.'
        );
    }

    public function restoreContract(Contract $contract)
    {
        $contract->update([
            'deleted' => false
        ]);

        return back()->with(
            'success',
            'Kontrak berhasil direstore.'
        );
    }

    public function forceDeleteContract(Contract $contract)
    {
        if ($contract->file_kontrak) {

            \Storage::disk('public')->delete(
                $contract->file_kontrak
            );

        }

        $contract->delete();

        return back()->with(
            'success',
            'Kontrak berhasil dihapus permanen.'
        );
    }

    public function restoreArchive(Archive $archive)
    {
        $archive->update([
            'deleted' => false
        ]);

        return back()->with(
            'success',
            'Arsip berhasil direstore.'
        );
    }

    public function forceDeleteArchive(Archive $archive)
    {
        $archive->delete();

        return back()->with(
            'success',
            'Arsip berhasil dihapus permanen.'
        );
    }

}