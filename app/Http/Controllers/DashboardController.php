<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD USER
    |--------------------------------------------------------------------------
    */

    $topContracts = Contract::with('tenant')
    ->where('deleted', false)
    ->whereNotNull('nilai_kontrak')
    ->orderByDesc('nilai_kontrak')
    ->take(10)
    ->get();

    $totalColocation = Tenant::where('deleted', false)
    ->where('jenis_layanan', 'Colocation')
    ->count();

    $totalVPS = Tenant::where('deleted', false)
    ->where('jenis_layanan', 'VPS')
    ->count();

    if (Auth::user()->role == 'user') {

        $totalTenant = Tenant::where('deleted', false)->count();

        $topTenants = Tenant::where('deleted', false)
            ->select(
                'nama_tenant',
                'jenis_layanan',
                'lokasi_ruangan'
            )
            ->orderBy('nama_tenant')
            ->take(10)
            ->get();

        return view('dashboard.user', compact(
            'totalTenant',
            'topTenants',
            'topContracts',
            'totalColocation',
            'totalVPS'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    $totalTenant = Tenant::where('deleted', false)->count();

    $sudahPKS = Tenant::where('deleted', false)
        ->where('status_pks', 'Sudah')
        ->count();

    $belumPKS = Tenant::where('deleted', false)
        ->where('status_pks', 'Belum')
        ->count();

    $kontrakAktif = Tenant::where('deleted', false)
        ->whereDate('masa_berakhir', '>=', Carbon::today())
        ->count();

    $instansiPemerintah = Tenant::where('deleted', false)
        ->where('instansi', 'Pemerintahan')
        ->count();

    $instansiSwasta = Tenant::where('deleted', false)
        ->where('instansi', 'Swasta')
        ->count();

    $instansiLainnya = Tenant::where('deleted', false)
        ->where('instansi', 'Lainnya')
        ->count();

    $kontrakHampirHabis = Tenant::where('deleted', false)
        ->whereBetween('masa_berakhir', [
            Carbon::today(),
            Carbon::today()->addDays(30)
        ])
        ->orderBy('masa_berakhir')
        ->get();

    $recentTenants = Tenant::where('deleted', false)
        ->latest()
        ->take(5)
        ->get();

    $topContracts = Contract::with('tenant')
        ->where('deleted', false)
        ->doesntHave('archive')
        ->whereNotNull('nilai_kontrak')
        ->orderByDesc('nilai_kontrak')
        ->take(10)
        ->get();

    return view('dashboard.index', compact(
        'totalTenant',
        'sudahPKS',
        'belumPKS',
        'kontrakAktif',
        'instansiPemerintah',
        'instansiSwasta',
        'instansiLainnya',
        'kontrakHampirHabis',
        'recentTenants',
        'topContracts'
    ));
}
}