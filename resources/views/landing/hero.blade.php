<section
id="hero"
class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Background --}}
    <img
        src="{{ asset('images/hero-bpbatam.jpg') }}"
        alt="Gedung BP Batam"
        class="absolute inset-0 w-full h-full object-cover">

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-gradient-to-r from-[#0B3C8A]/90 via-[#0B3C8A]/75 to-[#0B3C8A]/40">
    </div>

    {{-- Blur Decoration --}}
    <div
        class="absolute -top-20 -left-20 w-96 h-96 bg-blue-500/30 rounded-full blur-3xl">
    </div>

    <div
        class="absolute bottom-0 right-0 w-80 h-80 bg-cyan-400/20 rounded-full blur-3xl">
    </div>

    {{-- CONTENT --}}
    <div
        class="relative z-10 max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-20 items-center">

        {{-- LEFT --}}
        <div data-aos="fade-right">

            <span
                class="inline-flex items-center bg-yellow-400 text-black font-semibold px-5 py-2 rounded-full">

                Sistem Informasi Internal BP Batam

            </span>

            <h1
                class="mt-8 text-6xl font-extrabold text-white leading-tight">

                Sistem
                <br>

                Manajemen
                <br>

                Tenant

            </h1>

            <p
                class="mt-8 text-xl text-blue-100 leading-9">

                Platform digital untuk mengelola data tenant,
                kontrak kerja sama, arsip dokumen,
                serta monitoring masa berlaku kontrak
                secara terintegrasi.

            </p>

            <div
                class="mt-10 flex flex-wrap gap-5">


                <a
                    href="#fitur"
                    class="border border-white text-white hover:bg-white hover:text-[#0B3C8A] px-8 py-4 rounded-xl transition">

                    Pelajari Lebih Lanjut

                </a>

            </div>

        </div>

        {{-- RIGHT --}}
        <div
            data-aos="fade-left"
            class="hidden lg:flex justify-center">

            <div
                class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl w-[420px]">

                <h2
                    class="text-white text-2xl font-bold">

                    Sistem Terintegrasi

                </h2>

                <p
                    class="text-blue-100 mt-3">

                    Seluruh pengelolaan tenant berada
                    dalam satu platform.

                </p>

                <div
                    class="mt-8 space-y-5">

                    <div
                        class="flex items-center justify-between bg-white/10 rounded-xl p-4">

                        <span class="text-white">

                            🏢 Data Tenant

                        </span>

                        <span class="text-green-300 font-bold">

                            Aktif

                        </span>

                    </div>

                    <div
                        class="flex items-center justify-between bg-white/10 rounded-xl p-4">

                        <span class="text-white">

                            📄 Kontrak

                        </span>

                        <span class="text-yellow-300 font-bold">

                            Monitoring

                        </span>

                    </div>

                    <div
                        class="flex items-center justify-between bg-white/10 rounded-xl p-4">

                        <span class="text-white">

                            📦 Arsip

                        </span>

                        <span class="text-cyan-300 font-bold">

                            Digital

                        </span>

                    </div>

                    <div
                        class="flex items-center justify-between bg-white/10 rounded-xl p-4">

                        <span class="text-white">

                            ♻ Recycle Bin

                        </span>

                        <span class="text-red-300 font-bold">

                            Recovery

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Scroll --}}
    <div
        class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">

        <a href="#fitur">

            <i
                class="fa-solid fa-chevron-down text-white text-3xl">

            </i>

        </a>

    </div>

</section>