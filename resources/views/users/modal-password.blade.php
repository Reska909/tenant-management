<div
    id="modalPassword"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div
        id="modalPasswordContent"
        class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden scale-95 opacity-0 transition-all duration-300">

        {{-- HEADER --}}
        <div class="bg-indigo-600 text-white px-8 py-6">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold">

                        Reset Password User

                    </h2>

                    <p class="text-indigo-100 mt-1">

                        Masukkan password baru untuk user.

                    </p>

                </div>

                <button
                    id="btnClosePassword"
                    class="text-4xl leading-none">

                    &times;

                </button>

            </div>

        </div>

        {{-- FORM --}}
        <form
            id="formPassword"
            method="POST">

            @csrf

            @method('PUT')

            <div class="p-8 space-y-5">

                <div>

                    <label class="font-semibold">

                        Password Baru

                    </label>

                    <input

                        type="password"

                        name="password"

                        class="w-full border rounded-xl px-4 py-3 mt-2"

                        required>

                </div>

                <div>

                    <label class="font-semibold">

                        Konfirmasi Password

                    </label>

                    <input

                        type="password"

                        name="password_confirmation"

                        class="w-full border rounded-xl px-4 py-3 mt-2"

                        required>

                </div>

            </div>

            <div
                class="border-t bg-gray-50 px-8 py-5 flex justify-end gap-3">

                <button

                    id="btnCancelPassword"

                    type="button"

                    class="border px-6 py-3 rounded-xl">

                    Batal

                </button>

                <button

                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>