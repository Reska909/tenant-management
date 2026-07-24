<div class="overflow-x-auto">

<table class="min-w-full border-collapse">

<thead>

<tr class="bg-yellow-500 text-white">

<th class="px-6 py-4 text-center">No</th>

<th class="px-6 py-4 text-left">Tenant</th>

<th class="px-6 py-4 text-center">Nomor</th>

<th class="px-6 py-4 text-center">Judul</th>

<th class="px-6 py-4 text-center">Tanggal Arsip</th>

<th class="px-6 py-4 text-center">PDF</th>

<th class="px-6 py-4 text-center">Lokasi Arsip</th>

<th class="px-6 py-4 text-center">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($archives as $archive)

<tr class="border-b hover:bg-yellow-50 align-middle">

<td class="text-center py-4">

{{ $loop->iteration }}

</td>

<td class="px-6 py-4 font-semibold">

{{ $archive->contract->tenant->nama_tenant }}

</td>

<td class="text-center py-4">

{{ $archive->contract->nomor_kontrak }}

</td>

<td class="text-center py-4">

{{ $archive->contract->judul_kontrak }}

</td>

<td class="text-center py-4">

{{ $archive->archived_at->format('d/m/Y') }}

</td>

<td class="text-center py-4">

@if($archive->contract->file_kontrak)

<a

href="{{ route('contracts.preview',$archive->contract) }}"

target="_blank">

Preview

</a>

@endif

</td>

<td class="text-center py-4">

    @if($archive->contract && $archive->contract->tenant)

<div class="font-semibold text-gray-800">

    {{ $archive->contract->tenant->lokasi_ruangan }}

</div>

<div class="mt-2">

    <span
        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">

        Rak {{ $archive->contract->tenant->rak }}

    </span>

</div>

    @else

        -

    @endif

</td>

<td class="text-center py-4">

<div class="flex gap-2">

<button
type="button"

data-id="{{ $archive->id }}"

data-nama="{{ $archive->contract->judul_kontrak }}"

class="btnDeleteArchive bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

Hapus

</button>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="8">

<div class="text-center py-16 text-gray-400">

Belum ada arsip.

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-6">

{{ $archives->links() }}

</div>