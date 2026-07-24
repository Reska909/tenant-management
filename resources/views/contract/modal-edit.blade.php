<div
    id="modalEditContract"
    class="fixed inset-0 z-[9999] hidden">

    {{-- Overlay --}}
    <div
        id="overlayEditContract"
        class="absolute inset-0 bg-black/50">
    </div>

    {{-- Wrapper --}}
    <div
        class="fixed inset-0 flex justify-center items-start overflow-y-auto p-8">

    <div
        class="w-full max-w-5xl">

            <div
                class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl relative animate-[fadeUp_.25s_ease]">

                {{-- HEADER --}}
                <div
                    class="bg-yellow-500 rounded-t-3xl px-8 py-6 flex justify-between items-center">

                    <div>

                        <h2 class="text-3xl font-bold text-white">

                            Edit Kontrak

                        </h2>

                        <p class="text-yellow-100 mt-1">

                            Perbarui data kontrak tenant BP Batam

                        </p>

                    </div>

                    <button
                        id="btnCloseEditContract"
                        type="button"
                        class="text-white text-4xl hover:rotate-90 transition">

                        &times;

                    </button>

                </div>

                <form
                    id="formEditContract"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="p-8 space-y-6">

                        {{-- ROW 1 --}}
                        <div class="grid grid-cols-2 gap-5">

                            <div>

                                <label class="font-semibold">

                                    Tenant

                                </label>

                                <select
                                    id="edit_tenant_id"
                                    name="tenant_id"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

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
                                    id="edit_nomor_kontrak"
                                    name="nomor_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                        </div>

                        {{-- ROW 2 --}}
                        <div>

                            <label class="font-semibold">

                                Judul Kontrak

                            </label>

                            <input
                                id="edit_judul_kontrak"
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
                                    id="edit_tanggal_kontrak"
                                    name="tanggal_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Mulai

                                </label>

                                <input
                                    type="date"
                                    id="edit_mulai"
                                    name="mulai"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Selesai

                                </label>

                                <input
                                    type="date"
                                    id="edit_selesai"
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
                                    id="edit_nilai_kontrak"
                                    name="nilai_kontrak"
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Upload PDF Baru

                                </label>

                                <input
                                    id="edit_file_kontrak"
                                    type="file"
                                    name="file_kontrak"
                                    accept=".pdf"
                                    class="w-full mt-2 border rounded-xl px-3 py-2">

                                <a
                                    id="previewPDF"
                                    href="#"
                                    target="_blank"
                                    class="hidden text-blue-600 text-sm underline mt-2 inline-block">

                                    📄 Lihat PDF Saat Ini

                                </a>

                            </div>

                        </div>

                        {{-- ROW 5 --}}
                        <div>

                            <label class="font-semibold">

                                Keterangan

                            </label>

                            <textarea
                                id="edit_keterangan"
                                name="keterangan"
                                rows="4"
                                class="w-full mt-2 border rounded-xl px-4 py-3"></textarea>

                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div
                        class="bg-gray-50 border-t rounded-b-3xl px-8 py-5 flex justify-end gap-3">

                        <button
                            type="button"
                            id="btnCancelEditContract"
                            class="px-6 py-3 rounded-xl border">

                            Batal

                        </button>

                        <button
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl">

                            Update Kontrak

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>