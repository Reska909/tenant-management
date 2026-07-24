<div id="modalArchive"
class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">

<div class="bg-white rounded-xl shadow-xl w-full max-w-4xl">

<div class="border-b px-6 py-4">

<h2 class="text-2xl font-bold">

Tambah Arsip

</h2>

</div>

<form
action="{{ route('archives.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="grid grid-cols-2 gap-5 p-6">

<div>

<label>Tenant</label>

<select
name="tenant_id"
class="w-full border rounded-lg px-3 py-2">

@foreach($tenants as $tenant)

<option value="{{ $tenant->id }}">

{{ $tenant->nama_tenant }}

</option>

@endforeach

</select>

</div>

<div>

<label>Kategori</label>

<select
name="kategori"
class="w-full border rounded-lg px-3 py-2">

<option value="PKS">

PKS

</option>

<option value="MoU">

MoU

</option>

<option value="Perizinan">

Perizinan

</option>

<option value="Legal">

Legal

</option>

<option value="Lainnya">

Lainnya

</option>

</select>

</div>

<div class="col-span-2">

<label>Nama Dokumen</label>

<input
name="nama_file"
class="w-full border rounded-lg px-3 py-2">

</div>

<div class="col-span-2">

<label>Upload PDF</label>

<input
type="file"
name="file"
accept=".pdf"
class="w-full">

</div>

<div class="col-span-2">

<label>Keterangan</label>

<textarea
name="keterangan"
rows="4"
class="w-full border rounded-lg px-3 py-2"></textarea>

</div>

{{-- Lokasi Arsip --}}

<div>

<label>Lokasi Ruangan</label>

<input
    type="text"
    name="lokasi_ruangan"
    placeholder="Contoh: Ruang Arsip Lt.2"
    class="w-full border rounded-lg px-3 py-2">

</div>

<div>

<label>Lemari</label>

<select
    name="lemari"
    class="w-full border rounded-lg px-3 py-2">

    <option value="">Pilih Lemari</option>

    <option value="A">Lemari A</option>

    <option value="B">Lemari B</option>

    <option value="C">Lemari C</option>

    <option value="D">Lemari D</option>

</select>

</div>

<div>

<label>Rak</label>

<select
    name="rak"
    class="w-full border rounded-lg px-3 py-2">

    <option value="">Pilih Rak</option>

    @for($i=1;$i<=20;$i++)

        <option value="{{ sprintf('%02d',$i) }}">

            Rak {{ sprintf('%02d',$i) }}

        </option>

    @endfor

</select>

</div>

</div>

<div class="border-t p-5 flex justify-end gap-3">

<button
type="button"
id="btnCancelArchive"
class="border px-5 py-2 rounded">

Batal

</button>

<button
class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded">

Simpan

</button>

</div>

</form>

</div>

</div>