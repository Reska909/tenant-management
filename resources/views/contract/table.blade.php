<div class="overflow-x-auto">

<table class="min-w-full border-collapse">

    <thead>

        <tr class="bg-green-700 text-white">

            <th class="px-6 py-4 text-center">No</th>

            <th class="px-6 py-4 text-left">Tenant</th>

            <th class="px-6 py-4 text-center">Nomor Kontrak</th>

            <th class="px-6 py-4 text-center">Judul</th>

            <th class="px-6 py-4 text-center">Periode</th>

            <th class="px-6 py-4 text-center">Durasi</th>

            <th class="px-6 py-4 text-center">Status</th>

            <th class="px-6 py-4 text-center">Sisa Hari</th>

            <th class="px-6 py-4 text-center">Aksi</th>

        </tr>

    </thead>

    <tbody>

@forelse($contracts as $contract)

<tr class="border-b hover:bg-green-50 align-middle">

    <td class="px-6 py-4 text-center">

        {{ $loop->iteration }}

    </td>

    <td class="px-6 py-4 font-semibold">

        {{ $contract->tenant->nama_tenant }}

    </td>

    <td class="px-6 py-4 text-center">

        {{ $contract->nomor_kontrak }}

    </td>

    <td class="px-6 py-4 text-center">

        {{ $contract->judul_kontrak }}

    </td>

    <td class="px-6 py-4 text-center">

        {{ \Carbon\Carbon::parse($contract->mulai)->format('d/m/Y') }}

        -

        {{ \Carbon\Carbon::parse($contract->selesai)->format('d/m/Y') }}

    </td>

    <td class="px-6 py-4 text-center">

        {{ $contract->durasi_kontrak }} Hari

    </td>

    <td class="px-6 py-4 text-center">

        @if($contract->status_kontrak=="Aktif")

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                Aktif

            </span>

        @elseif($contract->status_kontrak=="Hampir Berakhir")

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                Hampir Berakhir

            </span>

        @else

            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                Berakhir

            </span>

        @endif

    </td>

    <td class="px-6 py-4 text-center">

        @if($contract->sisa_hari < 0)

            <span class="text-red-600 font-semibold">

                Berakhir

            </span>

        @else

            {{ $contract->sisa_hari }} Hari

        @endif

    </td>

    <td class="px-6 py-4">

        <div class="flex justify-center items-center flex-wrap gap-2">

            @if($contract->file_kontrak)

                <a
                    href="{{ route('contracts.preview',$contract->id) }}"
                    target="_blank"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">

                    👁 Preview

                </a>

                <a
                    href="{{ route('contracts.download',$contract->id) }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm">

                    ⬇ Download

                </a>

            @endif

            @if(!$contract->archive)

                <button
                    type="button"
                    class="btnArchive bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-lg text-sm"
                    data-id="{{ $contract->id }}"
                    data-tenant="{{ $contract->tenant->nama_tenant }}"
                    data-kontrak="{{ $contract->nomor_kontrak }}">

                    📦 Arsipkan

                </button>

            @endif

            <button
                type="button"
                class="btnEditContract bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm"
                data-id="{{ $contract->id }}">

                ✏ Edit

            </button>

            <form
                action="{{ route('contracts.destroy',$contract->id) }}"
                method="POST"
                class="inline">

                @csrf
                @method('DELETE')

                <button
                    type="button"
                    data-id="{{ $contract->id }}"
                    data-nama="{{ $contract->judul_kontrak }}"
                    class="btnDeleteContract bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">

                    🗑 Hapus

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="9">

        <div class="py-20 text-center text-gray-400">

            Belum ada data kontrak.

        </div>

    </td>

</tr>

@endforelse

    </tbody>

</table>

</div>

<div class="mt-6">

    {{ $contracts->links() }}

</div>