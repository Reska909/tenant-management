<div id="modalTenant"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl">

        <!-- HEADER -->

        <div class="bg-[#0B3C8A] text-white rounded-t-3xl px-8 py-6">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-3xl font-bold">

                        Tambah Tenant

                    </h2>

                    <p class="text-blue-100 mt-2">

                        Lengkapi data tenant BP Batam

                    </p>

                </div>

                <button
                    id="btnCloseModal"
                    class="text-4xl hover:text-red-300">

                    &times;

                </button>

            </div>

            <!-- STEPPER -->

            <div class="flex justify-between mt-8">

                <div
                    class="step-item flex flex-col items-center flex-1"
                    data-step="1">

                    <div
                        class="step-circle w-12 h-12 rounded-full bg-white text-[#0B3C8A] flex items-center justify-center font-bold">

                        1

                    </div>

                    <span class="mt-2 text-sm">

                        Tenant

                    </span>

                </div>

                <div
                    class="step-item flex flex-col items-center flex-1"
                    data-step="2">

                    <div
                        class="step-circle w-12 h-12 rounded-full bg-blue-700 border border-white flex items-center justify-center">

                        2

                    </div>

                    <span class="mt-2 text-sm">

                        Kontrak

                    </span>

                </div>

                <div
                    class="step-item flex flex-col items-center flex-1"
                    data-step="3">

                    <div
                        class="step-circle w-12 h-12 rounded-full bg-blue-700 border border-white flex items-center justify-center">

                        3

                    </div>

                    <span class="mt-2 text-sm">

                        Arsip

                    </span>

                </div>

            </div>

        </div>

        <form
            id="formCreateTenant"
            method="POST"
            action="{{ route('tenants.store') }}">

            @csrf

            <div class="p-8 min-h-[430px]">

                <!-- STEP 1 -->

                <div
                    class="wizard-step"
                    data-content="1">

                    <h3
                        class="text-2xl font-bold mb-6">

                        Informasi Tenant

                    </h3>

                    <div class="grid grid-cols-2 gap-6">

                        <div>

                            <label>Nama Tenant</label>

                            <input
                                name="nama_tenant"
                                class="w-full mt-2 rounded-xl border">

                        </div>

                        <div>

                            <label>Nama PIC</label>

                            <input
                                name="nama_pic"
                                class="w-full mt-2 rounded-xl border">

                        </div>

                        <div>

                            <label>No HP PIC</label>

                            <input
                                name="no_hp_pic"
                                class="w-full mt-2 rounded-xl border">

                        </div>

                        <div>

                            <label>Instansi</label>

                            <select
                                name="instansi"
                                class="w-full mt-2 rounded-xl border">

                                <option>Pemerintahan</option>

                                <option>Swasta</option>

                                <option>Lainnya</option>

                            </select>

                        </div>

                        <div>

                            <label>Jenis Layanan</label>

                            <select
                                id="jenisLayanan"
                                name="jenis_layanan"
                                class="w-full mt-2 rounded-xl border">

                                <option>Colocation</option>

                                <option>VPS</option>

                            </select>

                        </div>

                        <div>

                            <label>Status PKS</label>

                            <select
                                id="statusPKS"
                                name="status_pks"
                                class="w-full mt-2 rounded-xl border">

                                <option>Belum</option>

                                <option>Sudah</option>

                            </select>

                        </div>

                    </div>

                </div>

                                <!-- ================================================= -->

                <!-- STEP 2 -->

                <!-- ================================================= -->

                <div
                    class="wizard-step hidden"
                    data-content="2">

                    <h3
                        class="text-2xl font-bold mb-2">

                        Informasi Kontrak

                    </h3>

                    <p
                        class="text-gray-500 mb-8">

                        Isi data kontrak apabila tenant telah memiliki PKS.

                    </p>

                    <div class="grid grid-cols-2 gap-6">

                        <div>

                            <label class="font-semibold">

                                Nomor Kontrak

                            </label>

                            <input
                                type="text"
                                name="nomor_kontrak"
                                class="w-full mt-2 rounded-xl border border-gray-300">

                        </div>

                        <div>

                            <label class="font-semibold">

                                Tanggal PKS

                            </label>

                            <input
                                type="date"
                                name="tanggal_pks"
                                class="w-full mt-2 rounded-xl border border-gray-300">

                        </div>

                        <div>

                            <label class="font-semibold">

                                Masa Mulai

                            </label>

                            <input
                                type="date"
                                name="masa_mulai"
                                class="w-full mt-2 rounded-xl border border-gray-300">

                        </div>

                        <div>

                            <label class="font-semibold">

                                Masa Berakhir

                            </label>

                            <input
                                type="date"
                                name="masa_berakhir"
                                class="w-full mt-2 rounded-xl border border-gray-300">

                        </div>

                    </div>

                    <div
                        class="mt-10 rounded-2xl bg-green-50 border border-green-200 p-5">

                        <div class="flex gap-4">

                            <div
                                class="w-12 h-12 rounded-xl bg-green-600 text-white flex items-center justify-center">

                                <i class="fas fa-file-contract"></i>

                            </div>

                            <div>

                                <h4 class="font-bold text-green-700">

                                    Informasi

                                </h4>

                                <p class="text-green-600 mt-2 leading-7">

                                    Data kontrak akan digunakan untuk
                                    monitoring masa berlaku PKS,
                                    reminder kontrak,
                                    serta laporan tenant aktif.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                                <!-- =============================================== -->

                <!-- STEP 3 -->

                <!-- =============================================== -->

<div
    class="wizard-step hidden"
    data-content="3">

    <h3 class="text-2xl font-bold mb-2">
        Lokasi Arsip
    </h3>

    <p class="text-gray-500 mb-8">
        Tentukan lokasi penyimpanan arsip fisik tenant.
    </p>

    {{-- FORM COLOCATION --}}
    <div id="archiveForm">

        <div class="grid grid-cols-2 gap-6">

            <div>

                <label class="font-semibold">
                    Lokasi Ruangan
                </label>

                <select
                    name="lokasi_ruangan"
                    id="lokasi_ruangan"
                    class="w-full mt-2 rounded-xl border border-gray-300">

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
                    id="rak"
                    type="text"
                    name="rak"
                    placeholder="Contoh : A-01"
                    class="w-full mt-2 rounded-xl border border-gray-300">

            </div>

        </div>

    </div>

    {{-- INFORMASI VPS --}}
    <div
        id="vpsInfo"
        class="hidden mt-4">

        <div class="rounded-2xl bg-purple-50 border border-purple-200 p-8">

            <div class="flex items-start gap-5">

                <div class="w-16 h-16 rounded-2xl bg-purple-600 flex items-center justify-center">

                    <i class="fas fa-server text-3xl text-white"></i>

                </div>

                <div>

                    <h4 class="text-xl font-bold text-purple-700">

                        Tenant Menggunakan Layanan VPS

                    </h4>

                    <p class="mt-3 text-gray-700 leading-8">

                        Layanan <b>Virtual Private Server (VPS)</b> tidak memiliki
                        arsip fisik sehingga lokasi ruangan dan rak
                        tidak perlu diisi.

                    </p>

                    <ul class="mt-5 space-y-2 text-gray-700">

                        <li>✅ Tidak perlu memilih lokasi ruangan.</li>

                        <li>✅ Tidak perlu mengisi rak.</li>

                        <li>✅ Sistem otomatis menyimpan lokasi arsip sebagai "-".</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

            <!-- =============================================== -->

            <!-- FOOTER -->

            <!-- =============================================== -->

            <div
                class="border-t px-8 py-5 flex justify-between">

                <button
                    type="button"
                    id="btnPrev"
                    class="hidden bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">

                    ← Kembali

                </button>

                <div class="ml-auto flex gap-3">

                    <button
                        type="button"
                        id="btnBatal"
                        class="border px-6 py-3 rounded-xl hover:bg-gray-100">

                        Batal

                    </button>

                    <button
                        type="button"
                        id="btnNext"
                        class="bg-[#0B3C8A] text-white px-8 py-3 rounded-xl hover:bg-blue-800">

                        Selanjutnya →

                    </button>

                    <button
                        type="submit"
                        id="btnSubmit"
                        class="hidden bg-green-600 text-white px-8 py-3 rounded-xl hover:bg-green-700">

                        <i class="fas fa-save mr-2"></i>

                        Simpan Tenant

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>