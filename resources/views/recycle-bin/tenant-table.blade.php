<div class="bg-white rounded-2xl shadow-md">

    <div class="px-6 py-4 border-b">

        <h2 class="text-xl font-semibold">

            Tenant

        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border-collapse">

            <thead>

                <tr class="bg-blue-600 text-white">

                    <th class="px-4 py-3">No</th>

                    <th class="px-6 py-4 text-left">Nama Tenant</th>

                    <th class="px-4 py-3">PIC</th>

                    <th class="px-4 py-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($tenants as $tenant)

                <tr class="border-b hover:bg-blue-50 align-middle">

                    <td class="px-6 py-4 text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-6 py-4 font-semibold text-left">
                        {{ $tenant->nama_tenant }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        {{ $tenant->nama_pic }}
                    </td>

                    <td class="text-center">

                        <span class="text-gray-500">

                            <div class="flex items-center justify-center gap-2">

    <form
        action="{{ route('recycle.restore.tenant',$tenant->id) }}"
        method="POST">

        @csrf

        <button
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">

            Restore

        </button>

    </form>

    <form
        action="{{ route('recycle.force.tenant',$tenant->id) }}"
        method="POST">

        @csrf

        @method('DELETE')

        <button
            onclick="return confirm('Hapus permanen tenant ini?')"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

            Delete Forever

        </button>

    </form>

</div>

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-8 text-gray-400">

                        Tidak ada data.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>