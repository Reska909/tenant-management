@extends('layouts.admin')

@section('title','Data Arsip')

@section('content')

<!-- ================= HEADER ================= -->

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Data Arsip

        </h1>

        <p class="text-gray-500 mt-1">

            Daftar kontrak yang telah diarsipkan

        </p>

    </div>

</div>

<!-- ================= STATISTICS ================= -->

@include('archive.statistics')

<!-- ================= SEARCH ================= -->

@include('archive.search')

<!-- ================= TABLE ================= -->

<div class="bg-white rounded-2xl shadow-md p-6">

    @include('archive.table')

</div>

@endsection