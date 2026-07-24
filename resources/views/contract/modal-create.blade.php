<div
    id="modalContract"
    class="fixed inset-0 z-[9999] hidden">

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-black/50"
        id="overlayCreateContract">
    </div>

    {{-- Wrapper --}}
    <div
        class="absolute inset-0 overflow-y-auto p-8">

        <div
            class="flex justify-center items-start min-h-full">

            <div
                class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl relative animate-[fadeUp_.25s_ease]">

                {{-- HEADER --}}
                <div
                    class="bg-green-700 rounded-t-3xl px-8 py-6 flex justify-between items-center">

                    <div>

                        <h2 class="text-3xl font-bold text-white">

                            Tambah Kontrak

                        </h2>

                        <p class="text-green-100 mt-1">

                            Tambahkan data kontrak tenant BP Batam

                        </p>

                    </div>

                    <button
                        type="button"
                        id="btnCloseContract"
                        class="text-white text-4xl hover:rotate-90 transition">

                        &times;

                    </button>

                </div>

                <form
                    action="{{ route('contracts.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="p-8 space-y-6">

                        {{-- ROW 1 --}}
                        <div class="grid grid-cols-2 gap-5">

                            <div>

                                <label class="font-semibold">

                                    Tenant

                                </label>

                                <select
                                    name="tenant_id"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                                    <option value="">

                                        -- Pilih Tenant --

                                    </option>

                                    @foreach($tenants as $tenant)

                                    <option value="{{ $tenant->id }}">

                                        {{ $tenant->nama_tenant }}

                                    </option>

                                    @endforeach

                                </select>

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Nomor Kontrak

                                </label>

                                <input
                                    type="text"
                                    name="nomor_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3"
                                    placeholder="001/BPB/2026">

                            </div>

                        </div>

                        {{-- ROW 2 --}}
                        <div>

                            <label class="font-semibold">

                                Judul Kontrak

                            </label>

                            <input
                                type="text"
                                name="judul_kontrak"
                                class="w-full mt-2 border rounded-xl px-4 py-3">

                        </div>

                        {{-- ROW 3 --}}
                        <div class="grid grid-cols-3 gap-5">

                            <div>

                                <label class="font-semibold">

                                    Tanggal Kontrak

                                </label>

                                <input
                                    type="date"
                                    name="tanggal_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Mulai

                                </label>

                                <input
                                    type="date"
                                    name="mulai"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Selesai

                                </label>

                                <input
                                    type="date"
                                    name="selesai"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                        </div>

                        {{-- ROW 4 --}}
                        <div class="grid grid-cols-2 gap-5">

                            <div>

                                <label class="font-semibold">

                                    Nilai Kontrak

                                </label>

                                <input
                                    type="number"
                                    name="nilai_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Upload PDF

                                </label>

                                <input
                                    id="fileKontrak"
                                    type="file"
                                    name="file_kontrak"
                                    accept=".pdf"
                                    class="w-full mt-2 border rounded-xl px-3 py-2">

                                <p
                                    id="namaFile"
                                    class="text-sm text-gray-500 mt-2">

                                    Belum ada file dipilih

                                </p>

                            </div>

                        </div>

                        {{-- ROW 5 --}}
                        <div>

                            <label class="font-semibold">

                                Keterangan

                            </label>

                            <textarea
                                name="keterangan"
                                rows="4"
                                class="w-full mt-2 border rounded-xl px-4 py-3"></textarea>

                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div
                        class="bg-gray-50 rounded-b-3xl border-t px-8 py-5 flex justify-end gap-3">

                        <button
                            type="button"
                            id="btnCancelContract"
                            class="px-6 py-3 rounded-xl border">

                            Batal

                        </button>

                        <button
                            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-xl">

                            Simpan Kontrak

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>