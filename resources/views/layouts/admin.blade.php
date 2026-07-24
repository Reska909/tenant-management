<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title','Dashboard')
        | BP Batam
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-[#F5F7FB]">

<div class="flex min-h-screen">

    {{-- ========================================================= --}}
    {{-- SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside
        class="w-72 bg-[#0B3C8A] text-white flex flex-col shadow-xl">

        {{-- LOGO --}}

        <div class="px-6 py-6 border-b border-blue-500">

            <div class="flex items-center gap-4">

                <img
                    src="{{ asset('images/logo-bpbatam.png') }}"
                    class="h-20 w-auto">

                <div>

                    <h2
                        class="font-bold text-3xl">

                        BP BATAM

                    </h2>

                    <p
                        class="text-blue-100 text-sm leading-5">

                        Sistem Manajemen

                        <br>

                        Tenant

                    </p>

                </div>

            </div>

        </div>

        {{-- MENU --}}

{{-- MENU --}}

<nav class="flex-1 flex flex-col py-6">

    {{-- Dashboard (Semua Role) --}}
    <a
        href="{{ route('dashboard') }}"
        class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('dashboard') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

        <i class="fas fa-house text-lg transition group-hover:translate-x-1"></i>

        <span>Dashboard</span>

    </a>

    {{-- ===================================================== --}}
    {{-- MENU ADMIN --}}
    {{-- ===================================================== --}}
    @if(auth()->user()->role == 'admin')

        <a
            href="{{ route('tenants.index') }}"
            class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('tenants.*') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

            <i class="fas fa-building text-lg transition group-hover:translate-x-1"></i>

            <span>Tenant</span>

        </a>

        <a
            href="{{ route('contracts.index') }}"
            class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('contracts.*') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

            <i class="fas fa-file-contract text-lg transition group-hover:translate-x-1"></i>

            <span>Kontrak</span>

        </a>

        <a
            href="{{ route('archives.index') }}"
            class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('archives.*') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

            <i class="fas fa-box-archive text-lg transition group-hover:translate-x-1"></i>

            <span>Arsip</span>

        </a>

        <a
            href="{{ route('recycle-bin.index') }}"
            class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('recycle-bin.*') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

            <i class="fas fa-trash text-lg transition group-hover:translate-x-1"></i>

            <span>Recycle Bin</span>

        </a>

        <div class="px-7 mt-8 mb-3">

            <p class="text-blue-100 text-base">

                Administrator

            </p>

        </div>

        <a
            href="{{ route('users.index') }}"
            class="group flex items-center gap-4 px-7 py-4 transition hover:bg-blue-700 {{ request()->routeIs('users.*') ? 'bg-blue-700 border-r-4 border-white' : '' }}">

            <i class="fas fa-users text-lg transition group-hover:translate-x-1"></i>

            <span>Manajemen User</span>

        </a>

    @else

        {{-- ===================================================== --}}
        {{-- PANEL INFORMASI USER --}}
        {{-- ===================================================== --}}

        <div class="mt-8 mx-5">

            <div class="rounded-2xl bg-blue-800/80 border border-blue-600 p-5 shadow-lg">

                <div class="text-center">

                    <h3 class="text-sm uppercase tracking-widest text-blue-200 font-semibold">

                        Informasi

                    </h3>

                </div>

                <div class="mt-6 space-y-5">

                    <div class="flex justify-between items-center">

                        <span class="text-blue-100 flex items-center gap-2">

                            <i class="fas fa-building"></i>

                            Total Tenant

                        </span>

                        <span class="font-bold text-xl">

                            {{ $totalTenant ?? 0 }}

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-blue-100 flex items-center gap-2">

                            <i class="fas fa-server text-cyan-300"></i>

                            Colocation

                        </span>

                        <span class="font-bold text-xl text-cyan-300">

                            {{ $totalColocation ?? 0 }}

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-blue-100 flex items-center gap-2">

                            <i class="fas fa-cloud text-purple-300"></i>

                            VPS

                        </span>

                        <span class="font-bold text-xl text-purple-300">

                            {{ $totalVPS ?? 0 }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

    @endif

    <div class="flex-1"></div>

</nav>

                {{-- ========================================================= --}}
        {{-- USER PROFILE --}}
        {{-- ========================================================= --}}

        <div class="border-t border-blue-500 p-6">

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-full bg-white text-[#0B3C8A] flex items-center justify-center font-bold text-lg">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

                <div>

                    <div class="font-semibold">

                        {{ Auth::user()->name }}

                    </div>

                    <div class="mt-1">

                        @if(auth()->user()->role=='admin')

                            <span class="bg-purple-500 text-white text-xs px-3 py-1 rounded-full">

                                Administrator

                            </span>

                        @else

                            <span class="bg-cyan-500 text-white text-xs px-3 py-1 rounded-full">

                                User

                            </span>

                        @endif

                    </div>

                </div>

            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="mt-6">

                @csrf

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg transition duration-300">

                    <i class="fas fa-right-from-bracket mr-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </aside>

    {{-- ========================================================= --}}
    {{-- CONTENT --}}
    {{-- ========================================================= --}}

    <div class="flex-1 flex flex-col">

        {{-- HEADER --}}

        <header
            class="bg-white h-24 shadow-sm border-b border-gray-200 flex items-center justify-between px-10">

            <div>

                <h1
                    class="text-3xl font-bold text-gray-800">

                    @yield('title','Dashboard')

                </h1>

                <p
                    class="text-gray-500 mt-1">

                    Sistem Manajemen Tenant BP Batam

                </p>

            </div>

<div class="flex items-center gap-6">

    <div class="text-right">

        <div class="text-xl font-bold text-gray-800">

            {{ Auth::user()->name }}

        </div>

        <div class="text-base text-gray-500">

            {{ auth()->user()->role=='admin' ? 'Administrator' : 'User' }}

        </div>

        <div class="text-sm text-gray-400 mt-1">

            {{ now()->translatedFormat('l, d F Y') }}

        </div>

    </div>

    <div
        class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-700 to-blue-500 text-white flex items-center justify-center text-2xl font-bold shadow-xl">

        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

    </div>

</div>

        </header>

        {{-- MAIN CONTENT --}}

        <main
            class="p-8 flex-1"
            data-aos="fade-up">

            @yield('content')

        </main>
        @stack('modals')

    </div>

</div>

{{-- ========================================================= --}}
{{-- SWEET ALERT --}}
{{-- ========================================================= --}}

@yield('scripts')

@if(session('success'))

<script>

Swal.fire({

    icon:'success',

    title:'Berhasil',

    text:"{{ session('success') }}",

    confirmButtonColor:'#16a34a',

    timer:2500,

    timerProgressBar:true

});

</script>

@endif

@if(session('error'))

<script>

Swal.fire({

    icon:'error',

    title:'Gagal',

    text:"{{ session('error') }}",

    confirmButtonColor:'#dc2626'

});

</script>

@endif

@if ($errors->any())

<script>

Swal.fire({

    icon:'error',

    title:'Validasi Gagal',

    html:`

        <div class="text-left">

            @foreach($errors->all() as $error)

                • {{ $error }}<br>

            @endforeach

        </div>

    `,

    confirmButtonColor:'#dc2626'

});

</script>

@endif

</body>

</html>