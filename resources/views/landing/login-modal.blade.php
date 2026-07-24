<div
    id="loginModal"
    class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-sm">

    <div
        id="loginCard"
        class="relative w-full max-w-md mx-6 rounded-3xl bg-white shadow-2xl overflow-hidden scale-95 opacity-0 transition-all duration-300">

        {{-- Close --}}
        <button
            id="btnCloseLogin"
            type="button"
            class="absolute top-5 right-5 text-white hover:text-red-300 text-2xl z-20">

            <i class="fas fa-times"></i>

        </button>

        {{-- Header --}}
        <div class="bg-[#0B3C8A] px-10 py-10 text-center">

            <img
                src="{{ asset('images/logo-bpbatam.png') }}"
                class="h-20 mx-auto">

            <h2
                class="text-3xl font-bold text-white mt-5">

                BP BATAM

            </h2>

            <p
                class="text-blue-100 mt-2">

                Sistem Manajemen Tenant

            </p>

        </div>

        {{-- Body --}}
        <form
            method="POST"
            action="{{ route('login') }}"
            class="p-8">

            @csrf

            {{-- Error Login --}}
            @if ($errors->any())

                <div
                    class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

                    <div class="flex items-center gap-3">

                        <i
                            class="fas fa-circle-xmark text-red-600 text-xl">

                        </i>

                        <div>

                            <div class="font-semibold text-red-700">

                                Login Gagal

                            </div>

                            <div class="text-sm text-red-600">

                                Email atau password yang Anda masukkan salah.

                            </div>

                        </div>

                    </div>

                </div>

            @endif

            {{-- Email --}}
            <div class="mb-5">

                <label
                    class="font-semibold text-gray-700">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-600">

            </div>

            {{-- Password --}}
            <div class="mb-6">

                <label
                    class="font-semibold text-gray-700">

                    Password

                </label>

                <div class="relative mt-2">

                    <input
                        id="loginPassword"
                        type="password"
                        name="password"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 pr-12 focus:ring-2 focus:ring-blue-600">

                    <button
                        id="togglePassword"
                        type="button"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

            </div>

            {{-- Remember --}}
            <div
                class="flex justify-between items-center mb-8">

                <label
                    class="flex items-center gap-2 text-gray-600">

                    <input
                        type="checkbox"
                        name="remember">

                    Ingat Saya

                </label>

            </div>

            {{-- Button --}}
            <button
                id="btnLoginSubmit"
                type="submit"
                class="w-full bg-[#0B3C8A] hover:bg-[#082F70] text-white py-4 rounded-xl font-semibold transition duration-300">

                <span id="loginText">

                    <i class="fas fa-right-to-bracket mr-2"></i>

                    Masuk ke Sistem

                </span>

            </button>

        </form>

    </div>

</div>