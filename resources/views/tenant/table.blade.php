<div class="overflow-x-auto">

    <table class="min-w-full">

        <thead>

            <tr class="bg-[#0B3C8A] text-white">

                <th class="px-5 py-4 text-center w-16">No</th>

                <th class="px-5 py-4 text-left">Tenant</th>

                <th class="px-5 py-4 text-center">PIC</th>

                <th class="px-5 py-4 text-center">Instansi</th>

                <th class="px-5 py-4 text-center">Layanan</th>

                <th class="px-5 py-4 text-center">Status PKS</th>

                <th class="px-5 py-4 text-center">Lokasi Arsip</th>

                <th class="px-5 py-4 text-center">Kontrak</th>

                <th class="px-5 py-4 text-center">Berakhir</th>

                <th class="px-5 py-4 text-center w-44">

                    Aksi

                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($tenants as $tenant)

            <tr class="border-b hover:bg-blue-50 transition duration-200">

                {{-- NOMOR --}}
                <td class="text-center py-5">

                    {{ $loop->iteration }}

                </td>

                {{-- TENANT --}}
                <td class="px-5 py-4">

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">

                            <i class="fas fa-building text-blue-700"></i>

                        </div>

                        <div>

                            <div class="font-semibold text-gray-800">

                                {{ $tenant->nama_tenant }}

                            </div>

                            <div class="text-sm text-gray-500">

                                {{ $tenant->no_hp_pic }}

                            </div>

                        </div>

                    </div>

                </td>

                {{-- PIC --}}
                <td class="text-center">

                    {{ $tenant->nama_pic }}

                </td>

                {{-- INSTANSI --}}
                <td class="text-center">

                    {{ $tenant->instansi }}

                </td>

                {{-- LAYANAN --}}
                <td class="text-center">

                    @if($tenant->jenis_layanan=="Colocation")

                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            Colocation

                        </span>

                    @elseif($tenant->jenis_layanan=="VPS")

                        <span
                            class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">

                            VPS

                        </span>

                    @else

                        -

                    @endif

                </td>

                {{-- STATUS --}}
                <td class="text-center">

                    @if($tenant->status_pks=="Sudah")

                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                            Aktif

                        </span>

                    @else

                        <span
                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">

                            Belum PKS

                        </span>

                    @endif

                </td>

                        {{-- LOKASI --}}
                        <td class="text-center">

                            @if($tenant->jenis_layanan=="VPS")

                                -

                            @elseif($tenant->lokasi_ruangan)

                                <div>

                                    {{ $tenant->lokasi_ruangan }}

                                </div>

                                @if($tenant->rak)

                                    <div class="mt-2">

                                        <span
                                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">

                                            Rak {{ $tenant->rak }}

                                        </span>

                                    </div>

                                @endif

                            @else

                                -

                            @endif

                        </td>

                {{-- KONTRAK --}}
                <td class="text-center">

                    {{ $tenant->nomor_kontrak ?: '-' }}

                </td>

                {{-- BERAKHIR --}}
                <td class="text-center">

                    @if($tenant->masa_berakhir)

                        {{ \Carbon\Carbon::parse($tenant->masa_berakhir)->format('d M Y') }}

                    @else

                        -

                    @endif

                </td>

                {{-- AKSI --}}
                <td>

                    <div class="flex justify-center gap-2">

                        {{-- ADMIN --}}
                        @if(auth()->user()->isAdmin())

                            <button
                                data-id="{{ $tenant->id }}"
                                class="btnEdit w-10 h-10 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white flex items-center justify-center"
                                title="Edit">

                                <i class="fas fa-pen"></i>

                            </button>

                            <button
                                data-id="{{ $tenant->id }}"
                                data-nama="{{ $tenant->nama_tenant }}"
                                class="btnDelete w-10 h-10 rounded-lg bg-red-600 hover:bg-red-700 text-white flex items-center justify-center"
                                title="Hapus">

                                <i class="fas fa-trash"></i>

                            </button>

                        @else

                            <button
                                class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center"
                                title="Lihat Data">

                                <i class="fas fa-eye"></i>

                            </button>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="10">

                    <div class="py-20 text-center">

                        <div
                            class="w-24 h-24 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

                            <i class="fas fa-building text-5xl text-blue-600"></i>

                        </div>

                        <h2
                            class="mt-6 text-2xl font-bold text-gray-700">

                            Belum Ada Data Tenant

                        </h2>

                        <p
                            class="mt-3 text-gray-500">

                            Data tenant akan muncul di sini setelah ditambahkan.

                        </p>

                    </div>

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>