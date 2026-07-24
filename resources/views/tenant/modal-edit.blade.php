<div id="modalEditTenant"
    class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-4xl">

        <div class="border-b px-6 py-4 flex justify-between items-center">

            <h2 class="text-2xl font-bold">

                Edit Tenant

            </h2>

            <button
                type="button"
                id="btnCloseEdit"
                class="text-3xl text-gray-500 hover:text-red-600">

                &times;

            </button>

        </div>

        <form
            id="formEditTenant"
            method="POST">

            @csrf

            @method('PUT')

            <div class="grid grid-cols-2 gap-5 p-6">

                <div>

                    <label class="font-semibold">

                        Nama Tenant

                    </label>

                    <input
                        id="edit_nama_tenant"
                        type="text"
                        name="nama_tenant"
                        class="w-full border rounded-lg px-3 py-2 mt-1"
                        required>

                </div>

                <div>

                    <label class="font-semibold">

                        Nama PIC

                    </label>

                    <input
                        id="edit_nama_pic"
                        type="text"
                        name="nama_pic"
                        class="w-full border rounded-lg px-3 py-2 mt-1"
                        required>

                </div>

                <div>

                    <label class="font-semibold">

                        Nomor HP PIC

                    </label>

                    <input
                        id="edit_no_hp_pic"
                        type="text"
                        name="no_hp_pic"
                        class="w-full border rounded-lg px-3 py-2 mt-1"
                        required>

                </div>

                <div>

                    <label class="font-semibold">

                        Instansi

                    </label>

                    <div>

                    <label class="font-semibold">

                    Jenis Layanan

                    </label>

                    <select
                    id="edit_jenis_layanan"
                    name="jenis_layanan"
                    class="w-full border rounded-lg px-3 py-2 mt-1">

                    <option value="Colocation">

                    Colocation

                    </option>

                    <option value="VPS">

                    VPS

                    </option>

                    </select>

                    </div>

                    <select
                        id="edit_instansi"
                        name="instansi"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                        <option value="Pemerintahan">

                            Pemerintahan

                        </option>

                        <option value="Swasta">

                            Swasta

                        </option>

                        <option value="Lainnya">

                            Lainnya

                        </option>

                    </select>

                </div>

                <!-- Lokasi Ruangan -->
<div>

    <label class="font-semibold">

        Lokasi Ruangan

    </label>

    <select
        id="edit_lokasi_ruangan"
        name="lokasi_ruangan"
        class="w-full border rounded-lg px-3 py-2 mt-1">

        <option value="">Pilih Ruangan</option>

        <option value="Kalimantan">Kalimantan</option>

        <option value="Jawa">Jawa</option>

        <option value="Sulawesi">Sulawesi</option>

        <option value="Maluku">Maluku</option>

        <option value="Papua">Papua</option>

        <option value="Bali">Bali</option>

        <option value="Nusantara">Nusantara</option>

    </select>

<!-- Rak -->
<div>

    <label class="font-semibold">

        Rak

    </label>

    <input
        id="edit_rak"
        type="text"
        name="rak"
        class="w-full border rounded-lg px-3 py-2 mt-1">
</div>

                <div class="col-span-2">

                    <label class="font-semibold">

                        Status PKS

                    </label>

                    <select
                        id="edit_status_pks"
                        name="status_pks"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                        <option value="Belum">

                            Belum

                        </option>

                        <option value="Sudah">

                            Sudah

                        </option>

                    </select>

                </div>

            </div>

            <div
                id="editFormPKS"
                class="hidden grid grid-cols-2 gap-5 px-6 pb-6">

                <div>

                    <label class="font-semibold">

                        Nomor Kontrak

                    </label>

                    <input
                        id="edit_nomor_kontrak"
                        type="text"
                        name="nomor_kontrak"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                </div>

                <div></div>

                <div>

                    <label class="font-semibold">

                        Tanggal PKS

                    </label>

                    <input
                        id="edit_tanggal_pks"
                        type="date"
                        name="tanggal_pks"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                </div>

                <div>

                    <label class="font-semibold">

                        Masa Mulai

                    </label>

                    <input
                        id="edit_masa_mulai"
                        type="date"
                        name="masa_mulai"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                </div>

                <div>

                    <label class="font-semibold">

                        Masa Berakhir

                    </label>

                    <input
                        id="edit_masa_berakhir"
                        type="date"
                        name="masa_berakhir"
                        class="w-full border rounded-lg px-3 py-2 mt-1">

                </div>

            </div>

            <div class="border-t p-5 flex justify-end gap-3">

                <button
                    type="button"
                    id="btnCancelEdit"
                    class="border px-5 py-2 rounded-lg">

                    Batal

                </button>

                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg">

                    Update Data

                </button>

            </div>

        </form>

    </div>

</div>