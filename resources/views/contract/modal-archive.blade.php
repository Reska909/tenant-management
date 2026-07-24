<div
    id="modalArchive"
    class="fixed inset-0 z-[9999] hidden">

    {{-- Overlay --}}
    <div
        id="overlayArchive"
        class="absolute inset-0 bg-black/50">
    </div>

    {{-- Wrapper --}}
    <div
        class="absolute inset-0 overflow-hidden">

        <div
            class="flex justify-center pt-8 pb-8">

            <div
                class="bg-white rounded-3xl shadow-2xl w-full max-w-3xl relative animate-[fadeUp_.25s_ease]">

                {{-- HEADER --}}
                <div
                    class="bg-indigo-600 rounded-t-3xl px-8 py-6 flex justify-between items-center">

                    <div>

                        <h2 class="text-3xl font-bold text-white">

                            Arsipkan Kontrak

                        </h2>

                        <p class="text-indigo-100 mt-1">

                            Simpan kontrak ke dalam arsip fisik.

                        </p>

                    </div>

                    <button
                        id="btnCloseArchive"
                        type="button"
                        class="text-white text-4xl hover:rotate-90 transition">

                        &times;

                    </button>

                </div>

                <form
                    id="formArchive"
                    method="POST">

                    @csrf

                    <div class="p-8 space-y-5">

                        {{-- Tenant --}}
                        <div>

                            <label class="font-semibold">

                                Tenant

                            </label>

                            <input
                                id="archiveTenant"
                                class="w-full mt-2 border rounded-xl px-4 py-3 bg-gray-100"
                                readonly>

                        </div>

                        {{-- Nomor Kontrak --}}
                        <div>

                            <label class="font-semibold">

                                Nomor Kontrak

                            </label>

                            <input
                                id="archiveContract"
                                class="w-full mt-2 border rounded-xl px-4 py-3 bg-gray-100"
                                readonly>

                        </div>

                        {{-- Alasan --}}
                        <div>

                            <label class="font-semibold">

                                Alasan Arsip

                            </label>

                            <textarea
                                name="alasan"
                                rows="4"
                                required
                                class="w-full mt-2 border rounded-xl px-4 py-3"
                                placeholder="Masukkan alasan arsip..."></textarea>

                        </div>

                        {{-- Lokasi --}}
                        <div class="grid grid-cols-2 gap-5">

                            <div>

                                <label class="font-semibold">

                                    Lokasi Ruangan

                                </label>

                                <select
                                    name="lokasi_ruangan"
                                    required
                                    class="w-full mt-2 border rounded-xl px-4 py-3">

                                    <option value="">Pilih Ruangan</option>

                                    <option>Kalimantan</option>
                                    <option>Jawa</option>
                                    <option>Sulawesi</option>
                                    <option>Maluku</option>
                                    <option>Papua</option>
                                    <option>Bali</option>
                                    <option>Nusantara</option>

                                </select>

                            </div>

                            <div>

                                <label class="font-semibold">

                                    Rak

                                </label>

                                <input
                                    name="rak"
                                    required
                                    class="w-full mt-2 border rounded-xl px-4 py-3"
                                    placeholder="Contoh : A-01">

                            </div>

                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div
                        class="bg-gray-50 border-t rounded-b-3xl px-8 py-5 flex justify-end gap-3">

                        <button
                            type="button"
                            id="btnCancelArchive"
                            class="px-6 py-3 rounded-xl border">

                            Batal

                        </button>

                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl">

                            Arsipkan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>