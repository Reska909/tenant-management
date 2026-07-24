<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    {{-- Total Tenant --}}
    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-6 min-h-[170px] flex flex-col justify-between">

        <div>

            <p class="text-gray-500 text-lg">

                Total Tenant

            </p>

        </div>

        <div>

            <h2 class="text-5xl font-bold text-blue-700">

                {{ $tenants->count() }}

            </h2>

        </div>

    </div>

    {{-- Sudah PKS --}}
    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-6 min-h-[170px] flex flex-col justify-between">

        <div>

            <p class="text-gray-500 text-lg">

                Sudah PKS

            </p>

        </div>

        <div>

            <h2 class="text-5xl font-bold text-green-600">

                {{ $tenants->where('status_pks','Sudah')->count() }}

            </h2>

        </div>

    </div>

    {{-- Belum PKS --}}
    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-6 min-h-[170px] flex flex-col justify-between">

        <div>

            <p class="text-gray-500 text-lg">

                Belum PKS

            </p>

        </div>

        <div>

            <h2 class="text-5xl font-bold text-yellow-500">

                {{ $tenants->where('status_pks','Belum')->count() }}

            </h2>

        </div>

    </div>

    {{-- Kontrak Aktif --}}
    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-6 min-h-[170px] flex flex-col justify-between">

        <div>

            <p class="text-gray-500 text-lg">

                Kontrak Aktif

            </p>

        </div>

        <div>

            <h2 class="text-5xl font-bold text-purple-700">

                {{ $tenants->where('status_pks','Sudah')->count() }}

            </h2>

        </div>

    </div>

</div>