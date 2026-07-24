<form method="GET"
      action="{{ route('tenants.index') }}"
      class="flex justify-between items-center mb-6">

    <input
        type="text"
        name="keyword"
        value="{{ request('keyword') }}"
        placeholder="Cari nama tenant, PIC, instansi..."
        class="border rounded-lg px-4 py-3 w-96">

    <div class="flex gap-2">

        <button
            class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-3 rounded-lg">

            Cari

        </button>

        @if(request('keyword'))

        <a href="{{ route('tenants.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

            Reset

        </a>

        @endif

    </div>

</form>