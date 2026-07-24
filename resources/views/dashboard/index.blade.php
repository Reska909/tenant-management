@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Dashboard
</h1>

{{-- =========================
QUICK ACTION
========================= --}}

<div class="bg-white rounded-xl shadow p-6 mb-8">

    <h2 class="text-xl font-bold mb-5">
        Quick Action
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-5">

        <a href="{{ route('tenants.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl p-5 text-center transition">

            <div class="text-4xl mb-2">
                🏢
            </div>

            <div class="font-semibold">
                Data Tenant
            </div>

        </a>

        <a href="{{ route('contracts.index') }}"
           class="bg-green-600 hover:bg-green-700 text-white rounded-xl p-5 text-center transition">

            <div class="text-4xl mb-2">
                📄
            </div>

            <div class="font-semibold">
                Kontrak
            </div>

        </a>

        <a href="{{ route('archives.index') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl p-5 text-center transition">

            <div class="text-4xl mb-2">
                📁
            </div>

            <div class="font-semibold">
                Arsip
            </div>

        </a>

        <a href="{{ route('recycle-bin.index') }}"
           class="bg-red-600 hover:bg-red-700 text-white rounded-xl p-5 text-center transition">

            <div class="text-4xl mb-2">
                🗑️
            </div>

            <div class="font-semibold">
                Recycle Bin
            </div>

        </a>

        <a href="{{ route('tenants.index') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl p-5 text-center transition">

            <div class="text-4xl mb-2">
                ➕
            </div>

            <div class="font-semibold">
                Tambah Tenant
            </div>

        </a>

    </div>

</div>

{{-- =========================
CARD STATISTIK
========================= --}}

<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

   <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <p class="text-gray-500 text-lg leading-7">

        Total Tenant

    </p>

    <h2 class="text-5xl font-bold text-blue-700">

        {{ $totalTenant }}

    </h2>

</div>

    <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

        <p class="text-gray-500 text-lg leading-7">
            Sudah PKS
        </p>

        <h2 class="text-5xl font-bold text-purple-600">
            {{ $sudahPKS }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

        <p class="text-gray-500 text-lg leading-7">
            Belum PKS
        </p>

        <h2 class="text-5xl font-bold text-purple-600">
            {{ $belumPKS }}
        </h2>

    </div>

   <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <p class="text-gray-500 text-lg leading-7">

        Kontrak Aktif

    </p>

    <h2 class="text-5xl font-bold text-purple-600">

        {{ $kontrakAktif }}

    </h2>

</div>

</div>

{{-- =========================
WELCOME
========================= --}}

<div class="bg-white rounded-xl shadow p-8 mb-8">

    <h2 class="text-2xl font-bold mb-4">
        Selamat Datang
    </h2>

    <p class="text-gray-600 leading-8">

        Selamat datang di Sistem Manajemen Tenant Badan Pengusahaan Batam.

        Dashboard ini digunakan untuk memonitor seluruh data tenant,
        status PKS, kontrak aktif, arsip dokumen,
        serta aktivitas tenant secara realtime.

    </p>

</div>

{{-- =========================
GRAFIK
========================= --}}

<div class="grid grid-cols-2 gap-8 mb-8">

    {{-- CHART PKS --}}
    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-xl font-bold mb-6">
            Statistik Status PKS
        </h2>

        <div class="flex justify-center">

            <div class="w-72 h-72">

                <canvas id="chartPKS"></canvas>

            </div>

        </div>

    </div>

    {{-- CHART INSTANSI --}}
    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-xl font-bold mb-6">
            Statistik Instansi
        </h2>

        <div class="flex justify-center">

            <div class="w-full max-w-xl h-72">

                <canvas id="chartInstansi"></canvas>

            </div>

        </div>

    </div>

</div>

<div class="bg-white rounded-xl shadow p-8 mb-8">

    <h2 class="text-2xl font-bold mb-6">

        Top 10 Nilai Kontrak Tertinggi

    </h2>

    <div class="h-[500px]">

        <canvas id="chartTopContract"></canvas>

    </div>

</div>

{{-- =========================
KONTRAK HAMPIR HABIS
========================= --}}

<div class="bg-white rounded-xl shadow p-8 mb-8">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Kontrak Akan Berakhir (&lt; 30 Hari)
        </h2>

        <span class="text-sm text-gray-500">
            Monitoring Masa Kontrak
        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Tenant
                    </th>

                    <th class="text-left">
                        Nomor Kontrak
                    </th>

                    <th class="text-center">
                        Berakhir
                    </th>

                    <th class="text-center">
                        Sisa Hari
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($kontrakHampirHabis as $tenant)

                @php

                    $hari = (int) now()->startOfDay()->diffInDays(
                        \Carbon\Carbon::parse($tenant->masa_berakhir)->startOfDay(),
                        false
                    );

                @endphp

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-4">

                        {{ $tenant->nama_tenant }}

                    </td>

                    <td>

                        {{ $tenant->nomor_kontrak }}

                    </td>

                    <td class="text-center">

                        {{ \Carbon\Carbon::parse($tenant->masa_berakhir)->format('d M Y') }}

                    </td>

                    <td class="text-center">

                        @if($hari<=7)

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                {{ $hari }} Hari

                            </span>

                        @elseif($hari<=14)

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                {{ $hari }} Hari

                            </span>

                        @else

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                                {{ $hari }} Hari

                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-8 text-gray-400">

                        Tidak ada kontrak yang akan berakhir.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- =========================
5 TENANT TERBARU
========================= --}}

<div class="bg-white rounded-xl shadow p-8 mb-8">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            5 Tenant Terbaru
        </h2>

        <a href="{{ route('tenants.index') }}"
           class="text-blue-700 hover:underline">

            Lihat Semua

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Nama Tenant
                    </th>

                    <th class="text-center">
                        Instansi
                    </th>

                    <th class="text-center">
                        Status PKS
                    </th>

                    <th class="text-center">
                        Ditambahkan
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($recentTenants as $tenant)

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-4">

                        {{ $tenant->nama_tenant }}

                    </td>

                    <td class="text-center">

                        {{ $tenant->instansi }}

                    </td>

                    <td class="text-center">

                        @if($tenant->status_pks=='Sudah')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                Sudah

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                Belum

                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        {{ $tenant->created_at->format('d M Y') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-8 text-gray-400">

                        Belum ada data tenant.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- =========================
AKTIVITAS TERBARU
========================= --}}

<div class="bg-white rounded-xl shadow p-8 mb-8">

    <h2 class="text-2xl font-bold mb-6">

        Aktivitas Terbaru

    </h2>

    <div class="space-y-5">

        @forelse($recentTenants as $tenant)

        <div class="flex items-start gap-4 border-b pb-4">

            <div
                class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl">

                🏢

            </div>

            <div class="flex-1">

                <p class="font-semibold">

                    {{ $tenant->nama_tenant }}

                </p>

                <p class="text-gray-500 text-sm">

                    Tenant baru ditambahkan

                </p>

            </div>

            <div class="text-sm text-gray-400">

                {{ $tenant->created_at->diffForHumans() }}

            </div>

        </div>

        @empty

        <div class="text-center py-8 text-gray-400">

            Belum ada aktivitas.

        </div>

        @endforelse

    </div>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    /*
    |--------------------------------------------------------------------------
    | CHART STATUS PKS
    |--------------------------------------------------------------------------
    */

    const chartPKS=document.getElementById('chartPKS');

    if(chartPKS){

        new Chart(chartPKS,{

            type:'doughnut',

            data:{

                labels:[
                    'Sudah PKS',
                    'Belum PKS'
                ],

                datasets:[{

                    data:[
                        {{ $sudahPKS }},
                        {{ $belumPKS }}
                    ],

                    backgroundColor:[
                        '#22c55e',
                        '#facc15'
                    ],

                    hoverOffset:15,

                    borderWidth:0

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                cutout:'65%',

                plugins:{

                    legend:{

                        position:'bottom',

                        labels:{

                            usePointStyle:true,

                            padding:20,

                            font:{
                                size:13
                            }

                        }

                    }

                }

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | CHART INSTANSI
    |--------------------------------------------------------------------------
    */

    const chartInstansi=document.getElementById('chartInstansi');

    if(chartInstansi){

        new Chart(chartInstansi,{

            type:'bar',

            data:{

                labels:[

                    'Pemerintahan',

                    'Swasta',

                    'Lainnya'

                ],

                datasets:[{

                    label:'Jumlah Tenant',

                    data:[

                        {{ $instansiPemerintah }},

                        {{ $instansiSwasta }},

                        {{ $instansiLainnya }}

                    ],

                    backgroundColor:[

                        '#2563eb',

                        '#22c55e',

                        '#f59e0b'

                    ],

                    borderRadius:8,

                    borderSkipped:false

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                plugins:{

                    legend:{

                        display:false

                    }

                },

                scales:{

                    y:{

                        beginAtZero:true,

                        ticks:{

                            precision:0,

                            stepSize:1

                        }

                    }

                }

            }

        });

        /*
|--------------------------------------------------------------------------
| TOP 10 NILAI KONTRAK
|--------------------------------------------------------------------------
*/

const chartTop=document.getElementById('chartTopContract');

if(chartTop){

    new Chart(chartTop,{

        type:'bar',

        data:{

            labels:[
                @foreach($topContracts as $contract)
                    "{{ $contract->tenant->nama_tenant }}",
                @endforeach
            ],

            datasets:[{

                label:'Nilai Kontrak',

                data:[

                    @foreach($topContracts as $contract)

                        {{ $contract->nilai_kontrak }},

                    @endforeach

                ],

                backgroundColor:'#2563eb',

                borderRadius:8

            }]

        },

        options:{

            indexAxis:'y',

            responsive:true,

            maintainAspectRatio:false,

            plugins:{

                legend:{

                    display:false

                }

            },

            scales:{

                x:{

                    beginAtZero:true,

                    ticks:{

                        callback:function(value){

                            return 'Rp ' + Intl.NumberFormat('id-ID').format(value);

                        }

                    }

                }

            }

        }

    });

}

    }

});

</script>

@endsection