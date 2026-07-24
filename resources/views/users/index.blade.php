@extends('layouts.admin')

@section('title','Manajemen User')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Manajemen User

        </h1>

        <p class="text-gray-500 mt-1">

            Kelola akun Administrator dan User

        </p>

    </div>

    <button
        id="btnTambahUser"
        class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-lg transition">

        + Tambah User

    </button>

</div>

@include('users.statistics')

<div class="bg-white rounded-xl shadow p-6">

    @include('users.search')

    @include('users.table')

</div>

@include('users.modal-create')

@include('users.modal-edit')

@include('users.modal-password')

@endsection