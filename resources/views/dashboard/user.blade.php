@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="grid grid-cols-12 gap-6">

    {{-- Total Tenant --}}
    <div class="col-span-3">

        <div class="bg-white rounded-2xl shadow p-8 h-full">

            <div class="text-gray-500">

                Total Tenant

            </div>

            <div class="text-6xl font-bold text-blue-600 mt-5">

                {{ $totalTenant }}

            </div>

        </div>

    </div>

    {{-- Grafik --}}
    <div class="col-span-9">

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-bold mb-4">

                Top 10 Nilai Kontrak

            </h2>

            <div class="h-72">

                <canvas
                    id="contractChart"
                    data-labels='@json($topContracts->pluck("tenant.nama_tenant"))'
                    data-values='@json($topContracts->pluck("nilai_kontrak"))'>
                </canvas>

            </div>

        </div>

    </div>

</div>

<div class="bg-white rounded-2xl shadow mt-8">

    <div class="p-6 border-b">

        <div class="flex justify-between items-center">

            <h2 class="text-2xl font-bold">

                Data Tenant

            </h2>

            <input
                type="text"
                id="searchTenant"
                placeholder="Cari tenant..."
                class="border rounded-xl px-5 py-3 w-80">

        </div>

    </div>

    <table class="w-full">

        <thead class="bg-[#0B3C8A] text-white">

            <tr>

                <th class="py-4 text-left pl-8">Tenant</th>

                <th class="py-4 text-center">Layanan</th>

                <th class="py-4 text-center">Lokasi Arsip</th>

            </tr>

        </thead>

        <tbody id="tenantTable">

            @foreach($topTenants as $tenant)

            <tr class="border-b hover:bg-gray-50">

                <td class="py-5 pl-8 font-semibold">

                    {{ $tenant->nama_tenant }}

                </td>

                <td class="text-center">

                    @if($tenant->jenis_layanan == "VPS")

                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full">

                            VPS

                        </span>

                    @elseif($tenant->jenis_layanan == "Colocation")

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                            Colocation

                        </span>

                    @else

                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full">

                            Belum Dipilih

                        </span>

                    @endif

                </td>

                <td class="text-center">

                    @if($tenant->jenis_layanan == "Colocation")

                        {{ $tenant->lokasi_ruangan ?? "-" }}

                    @else

                        -

                    @endif

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection