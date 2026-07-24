<nav
id="navbar"
class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

    <div class="max-w-7xl mx-auto">

        <div class="flex items-center justify-between px-8 py-5">

            {{-- Logo --}}
            <a
                href="#hero"
                class="flex items-center gap-4">

                <img
                    src="{{ asset('images/logo-bpbatam.png') }}"
                    class="h-14">

                <div>

                    <h2
                        id="navbarTitle"
                        class="font-bold text-white text-xl transition-all">

                        BP BATAM

                    </h2>

                    <p
                        id="navbarSubtitle"
                        class="text-blue-100 text-sm transition-all">

                        Sistem Manajemen Tenant

                    </p>

                </div>

            </a>

            {{-- Menu Desktop --}}
            <div
                class="hidden lg:flex items-center gap-8">

                <a
                    href="#hero"
                    class="nav-link text-white hover:text-yellow-300 transition">

                    Beranda

                </a>

                <a
                    href="#fitur"
                    class="nav-link text-white hover:text-yellow-300 transition">

                    Fitur

                </a>

                <a
                    href="#workflow"
                    class="nav-link text-white hover:text-yellow-300 transition">

                    Alur

                </a>

                <a
                    href="#tentang"
                    class="nav-link text-white hover:text-yellow-300 transition">

                    Tentang

                </a>

                <a
                    href="#lokasi"
                    class="nav-link text-white hover:text-yellow-300 transition">

                    Lokasi

                </a>

                <button
                    id="btnOpenLogin"
                    type="button"
                    class="bg-white text-[#0B3C8A] px-7 py-3 rounded-xl font-semibold hover:bg-yellow-300 transition shadow-lg">

                    <i class="fas fa-right-to-bracket mr-2"></i>

                    Masuk

                </button>

            </div>

            {{-- Mobile --}}
            <button
                id="btnMobileMenu"
                class="lg:hidden text-white text-3xl">

                <i class="fas fa-bars"></i>

            </button>

        </div>

        {{-- Mobile Menu --}}
        <div
            id="mobileMenu"
            class="hidden lg:hidden bg-[#0B3C8A]/95 backdrop-blur-xl rounded-b-2xl">

            <div class="flex flex-col p-6 gap-5">

                <a
                    href="#hero"
                    class="text-white">

                    Beranda

                </a>

                <a
                    href="#fitur"
                    class="text-white">

                    Fitur

                </a>

                <a
                    href="#workflow"
                    class="text-white">

                    Alur

                </a>

                <a
                    href="#tentang"
                    class="text-white">

                    Tentang

                </a>

                <a
                    href="#lokasi"
                    class="text-white">

                    Lokasi

                </a>

                <button
                    id="btnOpenLoginMobile"
                    class="bg-white text-[#0B3C8A] rounded-xl py-3 font-semibold">

                    Masuk ke Sistem

                </button>

            </div>

        </div>

    </div>

</nav>