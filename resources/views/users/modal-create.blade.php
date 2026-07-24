<!-- =========================
MODAL TAMBAH USER
========================= -->

<div
    id="modalTambahUser"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div
        class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden">

        <!-- Header -->

        <div
            class="bg-gradient-to-r from-blue-700 to-blue-900 text-white p-6 flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-bold">

                    Tambah User

                </h2>

                <p class="text-blue-100 text-sm mt-1">

                    Tambahkan Administrator atau User baru

                </p>

            </div>

            <button
                id="closeTambahUser"
                class="text-3xl hover:text-red-300">

                &times;

            </button>

        </div>

        <!-- Form -->

        <form
            action="{{ route('users.store') }}"
            method="POST">

            @csrf

            <div class="p-8">

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Nama -->

                    <div>

                        <label class="font-semibold">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            required
                            class="mt-2 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Email -->

                    <div>

                        <label class="font-semibold">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            class="mt-2 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- Password -->

                    <div>

                        <label class="font-semibold">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="mt-2 w-full border rounded-lg px-4 py-3">

                    </div>

                    <!-- Konfirmasi -->

                    <div>

                        <label class="font-semibold">

                            Konfirmasi Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="mt-2 w-full border rounded-lg px-4 py-3">

                    </div>

                    <!-- Role -->

                    <div>

                        <label class="font-semibold">

                            Role

                        </label>

                        <select name="role">

                            <option value="user">

                                User

                            </option>

                            <option value="admin">

                                Administrator

                            </option>

                        </select>

                    </div>

                    <!-- Status -->

                    <div>

                        <label class="font-semibold">

                            Status

                        </label>

                        <select
                            name="status"
                            class="mt-2 w-full border rounded-lg px-4 py-3">

                            <option value="aktif">

                                Aktif

                            </option>

                            <option value="nonaktif">

                                Nonaktif

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- Footer -->

            <div
                class="bg-gray-50 px-8 py-5 flex justify-end gap-3">

                <button
                    type="button"
                    id="batalTambahUser"
                    class="px-6 py-3 rounded-lg border hover:bg-gray-100">

                    Batal

                </button>

                <button
                    class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg">

                    Simpan User

                </button>

            </div>

        </form>

    </div>

</div>