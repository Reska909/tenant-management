@extends('layouts.admin')

@section('title','Data Kontrak')

@section('content')

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Data Kontrak

        </h1>

        <p class="text-gray-500 mt-1">

            Daftar seluruh kontrak tenant

        </p>

    </div>

    <div class="flex gap-3">

        <a
            href="{{ route('contracts.export.pdf') }}"
            class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl shadow">

            📄 Export PDF

        </a>

        <button
            id="btnTambahContract"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-xl shadow">

            + Tambah Kontrak

        </button>

    </div>

</div>

@include('contract.statistics')

@include('contract.chart')

@include('contract.reminder')

@include('contract.recent')

<div class="bg-white rounded-xl shadow p-6 mb-8">

    <form method="GET">

        <div class="flex gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari tenant, nomor kontrak..."
                class="flex-1 border rounded-lg px-4 py-3">

            <select
                name="status"
                class="border rounded-lg px-4 py-3">

                <option value="">Semua Status</option>

                <option
                    value="aktif"
                    {{ request('status')=='aktif' ? 'selected' : '' }}>

                    Aktif

                </option>

                <option
                    value="warning"
                    {{ request('status')=='warning' ? 'selected' : '' }}>

                    Hampir Berakhir

                </option>

                <option
                    value="expired"
                    {{ request('status')=='expired' ? 'selected' : '' }}>

                    Berakhir

                </option>

            </select>

            <button
                type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-6 rounded-lg">

                Cari

            </button>

        </div>

    </form>

</div>

<div class="bg-white rounded-2xl shadow-md p-6">

    @include('contract.table')

</div>

@push('modals')

@include('contract.modal-create')

@include('contract.modal-edit')

@include('contract.modal-archive')

@endpush

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",()=>{

    const chart=document.getElementById("chartContract");

    if(!chart) return;

    new Chart(chart,{

        type:"doughnut",

        data:{

            labels:[
                "Aktif",
                "Hampir Berakhir",
                "Berakhir"
            ],

            datasets:[{

                data:[
                    {{ $aktif }},
                    {{ $warning }},
                    {{ $expired }}
                ],

                backgroundColor:[
                    "#22c55e",
                    "#facc15",
                    "#ef4444"
                ],

                borderWidth:0

            }]

        },

        options:{

            responsive:true,

            maintainAspectRatio:false,

            cutout:"65%",

            plugins:{

                legend:{

                    position:"bottom"

                }

            }

        }

    });

});

</script>

@endsection