@extends('layouts.admin')

@section('title','Recycle Bin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Recycle Bin

        </h1>

        <p class="text-gray-500 mt-1">

            Data yang telah dihapus dapat dipulihkan kembali atau dihapus permanen.

        </p>

    </div>

</div>

@include('recycle-bin.statistics')

<div class="space-y-8 mt-8">

    @include('recycle-bin.tenant-table')

    @include('recycle-bin.contract-table')

    @include('recycle-bin.archive-table')

</div>

@endsection