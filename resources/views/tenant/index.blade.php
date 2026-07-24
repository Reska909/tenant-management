@extends('layouts.admin')

@section('title','Data Tenant')

@section('content')

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-8">

    <div>

        <div class="flex items-center gap-3">

            <div
                class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i class="fas fa-building text-2xl text-blue-700"></i>

            </div>

            <div>

                <h1 class="text-3xl font-bold text-gray-800">

                    Data Tenant

                </h1>

                <p class="text-gray-500 mt-1">

                    Kelola seluruh data tenant BP Batam secara terintegrasi.

                </p>

            </div>

        </div>

    </div>

    {{-- Tombol hanya Admin --}}
    @if(auth()->user()->isAdmin())

        <button
            id="btnTambahTenant"
            class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition flex items-center gap-3">

            <i class="fas fa-plus-circle"></i>

            Tambah Tenant

        </button>

    @endif

</div>

{{-- Statistik --}}
@include('tenant.statistics')

<div class="bg-white rounded-2xl shadow-lg border border-gray-100">

    <div class="p-6">

        @include('tenant.search')

    </div>

    <div class="border-t">

        @include('tenant.table')

    </div>

</div>

@if(auth()->user()->isAdmin())

    @include('tenant.modal-create')

    @include('tenant.modal-edit')

@endif

@endsection