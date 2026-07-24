<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        Sistem Manajemen Tenant | BP Batam

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    {{-- AOS --}}
    <link
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet">

</head>

<body class="bg-white overflow-x-hidden">

    @include('landing.preloader')

    {{-- Navbar --}}
    @include('landing.navbar')

    {{-- Hero --}}
    @include('landing.hero')

    {{-- Features --}}
    @include('landing.features')

    {{-- Workflow --}}
    @include('landing.workflow')

    {{-- Dashboard Preview --}}
    @include('landing.dashboard-preview')

    {{-- About --}}
    @include('landing.about')

    {{-- Location --}}
    @include('landing.location')

    {{-- Footer --}}
    @include('landing.footer')

    {{-- Login Modal --}}
    @include('landing.login-modal')

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>

        AOS.init({

            once:true,

            duration:900

        });

    </script>

</body>

</html>