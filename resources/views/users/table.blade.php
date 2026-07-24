<div class="overflow-x-auto">

    <table class="w-full text-sm">

        <thead>

            <tr class="bg-green-700 text-white">

                <th class="px-4 py-4">No</th>

                <th class="px-4 py-4 text-left">User</th>

                <th class="px-4 py-4 text-left">Email</th>

                <th class="px-4 py-4">Role</th>

                <th class="px-4 py-4">Status</th>

                <th class="px-4 py-4">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($users as $user)

            <tr class="border-b hover:bg-gray-50 transition">

                <td class="px-4 py-4 text-center">

                    {{ $loop->iteration + ($users->firstItem() - 1) }}

                </td>

                {{-- USER --}}
                <td class="px-4 py-4">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">

                            <i class="fas fa-user text-blue-700"></i>

                        </div>

                        <div>

                            <div class="font-semibold">

                                {{ $user->name }}

                            </div>

                            <div class="text-xs text-gray-500">

                                ID : {{ $user->id }}

                            </div>

                        </div>

                    </div>

                </td>

                {{-- EMAIL --}}
                <td class="px-4 py-4">

                    {{ $user->email }}

                </td>

                {{-- ROLE --}}
                <td class="px-4 py-4 text-center">

                    @if($user->role=='admin')

                    <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-semibold">

                        Administrator

                    </span>

                    @else

                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">

                        User

                    </span>

                    @endif

                </td>

                {{-- STATUS --}}
                <td class="px-4 py-4 text-center">

                    @if($user->status=='aktif')

                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">

                            Aktif

                        </span>

                    @else

                        <span
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">

                            Nonaktif

                        </span>

                    @endif

                </td>

                {{-- AKSI --}}
                <td class="px-4 py-4">

                    <div class="flex justify-center gap-2">

                        {{-- EDIT --}}
                        <button

                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg btnEditUser"

                            data-id="{{ $user->id }}"

                            data-name="{{ $user->name }}"

                            data-email="{{ $user->email }}"

                            data-role="{{ $user->role }}"

                            data-status="{{ $user->status }}">

                            ✏ Edit

                        </button>

                        {{-- RESET PASSWORD --}}
                        <button

                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg btnResetPassword"

                            data-id="{{ $user->id }}">

                            🔑 Password

                        </button>

                        {{-- HAPUS --}}
                        @if(auth()->id() != $user->id)

                        <form

                            action="{{ route('users.destroy',$user) }}"

                            method="POST"

                            class="formDeleteUser">

                            @csrf

                            @method('DELETE')

                            <button

                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                🗑 Hapus

                            </button>

                        </form>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="6"
                    class="py-12 text-center text-gray-500">

                    Belum ada data user.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">

    {{ $users->links() }}

</div>