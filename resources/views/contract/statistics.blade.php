<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <div class="text-gray-500 text-lg leading-7">

        Total Kontrak

    </div>

    <div class="text-5xl font-bold text-blue-600">

        {{ $totalContract }}

    </div>

</div>

    <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <div class="text-gray-500 text-lg leading-7">

        Aktif

    </div>

    <div class="text-5xl font-bold text-green-600">

        {{ $aktif }}

    </div>

</div>

   <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <div class="text-gray-500 text-lg leading-7">

        Hampir Berakhir

    </div>

    <div class="text-5xl font-bold text-yellow-500">

        {{ $warning }}

    </div>

</div>

   <div class="bg-white rounded-xl shadow p-6 min-h-[170px] flex flex-col justify-between">

    <div class="text-gray-500 text-lg leading-7">

        Berakhir

    </div>

    <div class="text-5xl font-bold text-red-600">

        {{ $expired }}

    </div>

</div>

</div>