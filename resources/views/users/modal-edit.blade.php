<div
    id="modalEditUser"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div
        id="modalEditUserContent"
        class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden scale-95 opacity-0 transition-all duration-300">

        {{-- HEADER --}}
        <div class="bg-yellow-500 text-white px-8 py-6">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-3xl font-bold">

                        Edit User

                    </h2>

                    <p class="text-yellow-100 mt-1">

                        Perbarui informasi akun pengguna.

                    </p>

                </div>

                <button
                    id="btnCloseEditUser"
                    type="button"
                    class="text-4xl leading-none hover:rotate-90 transition-all duration-300">

                    &times;

                </button>

            </div>

        </div>

        {{-- FORM --}}
        <form
            id="formEditUser"
            method="POST">

            @csrf

            @method('PUT')

            <div class="p-8 space-y-6">

                {{-- Nama --}}
                <div>

                    <label class="block font-semibold mb-2">

                        Nama User

                    </label>

                    <input

                        id="edit_name"

                        name="name"

                        type="text"

                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400"

                        required>

                </div>

                {{-- Email --}}
                <div>

                    <label class="block font-semibold mb-2">

                        Email

                    </label>

                    <input

                        id="edit_email"

                        name="email"

                        type="email"

                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400"

                        required>

                </div>

                <div class="grid grid-cols-2 gap-5">

                    {{-- Role --}}
                    <div>

                        <label class="block font-semibold mb-2">

                            Role

                        </label>

                        <select

                            id="edit_role"

                            name="role"

                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-yellow-400">

                            <option value="admin">

                                Administrator

                            </option>

                            <option value="user">

                                User

                            </option>

                        </select>

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="block font-semibold mb-2">

                            Status

                        </label>

                        <select

                            id="edit_status"

                            name="status"

                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-yellow-400">

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

            {{-- FOOTER --}}
            <div
                class="border-t bg-gray-50 px-8 py-5 flex justify-end gap-3">

                <button

                    id="btnCancelEditUser"

                    type="button"

                    class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                    Batal

                </button>

                <button

                    type="submit"

                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl transition">

                    💾 Update User

                </button>

            </div>

        </form>

    </div>

</div>