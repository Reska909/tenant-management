<footer class="bg-[#0B3C8A] text-white pt-20 pb-10">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-4 gap-12">

            {{-- Logo --}}
            <div>

                <div class="flex items-center gap-4">

                    <img
                        src="{{ asset('images/logo-bpbatam.png') }}"
                        class="h-16">

                    <div>

                        <h2 class="text-2xl font-bold">

                            BP BATAM

                        </h2>

                        <p class="text-blue-200">

                            Sistem Manajemen Tenant

                        </p>

                    </div>

                </div>

                <p class="mt-6 text-blue-100 leading-8">

                    Platform digital untuk membantu
                    pengelolaan tenant,
                    kontrak,
                    arsip,
                    serta monitoring masa berlaku kontrak
                    secara lebih efektif, aman,
                    dan terintegrasi.

                </p>

            </div>

            {{-- Menu --}}
            <div>

                <h3
                    class="font-bold text-xl mb-6">

                    Menu

                </h3>

                <ul class="space-y-4">

                    <li>

                        <a href="#hero"
                           class="hover:text-yellow-300">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a href="#fitur"
                           class="hover:text-yellow-300">

                            Fitur

                        </a>

                    </li>

                    <li>

                        <a href="#workflow"
                           class="hover:text-yellow-300">

                            Alur Sistem

                        </a>

                    </li>

                    <li>

                        <a href="#tentang"
                           class="hover:text-yellow-300">

                            Tentang

                        </a>

                    </li>

                    <li>

                        <a href="#lokasi"
                           class="hover:text-yellow-300">

                            Lokasi

                        </a>

                    </li>

                </ul>

            </div>

            {{-- Kontak --}}
            <div>

                <h3
                    class="font-bold text-xl mb-6">

                    Kontak

                </h3>

                <div class="space-y-4">

                    <div class="flex gap-3">

                        <i class="fas fa-location-dot mt-1"></i>

                        <span>

                            BP Batam<br>
                            Batam Centre

                        </span>

                    </div>

                    <div class="flex gap-3">

                        <i class="fas fa-phone mt-1"></i>

                        <span>

                            (0778) 462047

                        </span>

                    </div>

                    <div class="flex gap-3">

                        <i class="fas fa-envelope mt-1"></i>

                        <span>

                            humas@bpbatam.go.id

                        </span>

                    </div>

                </div>

            </div>

            {{-- Login --}}
            <div>

                <h3
                    class="font-bold text-xl mb-6">

                    Sistem

                </h3>

                <p
                    class="text-blue-100 leading-8">

                    Masuk ke Sistem Manajemen Tenant
                    untuk mengelola data tenant,
                    kontrak,
                    dan arsip.

                </p>

              

            </div>

        </div>

        <hr class="border-blue-500 my-12">

        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-blue-200">

                © {{ date('Y') }}
                Badan Pengusahaan Batam.
                Seluruh Hak Cipta Dilindungi.

            </p>

            <p class="text-blue-200">

                Sistem Manajemen Tenant v1.0

            </p>

        </div>

    </div>

</footer>