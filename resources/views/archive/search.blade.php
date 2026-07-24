<div class="bg-white rounded-xl shadow p-6 mb-8">

<form method="GET">

<div class="flex gap-4">

<input

type="text"

name="search"

value="{{ request('search') }}"

placeholder="Cari tenant atau nomor kontrak..."

class="flex-1 border rounded-lg px-4 py-3">

<button

class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 rounded-lg">

Cari

</button>

</div>

</form>

</div>