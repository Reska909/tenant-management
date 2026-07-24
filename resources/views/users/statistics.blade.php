<div class="grid md:grid-cols-5 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6">

        <div class="text-gray-500">

            Total User

        </div>

        <div class="text-4xl font-bold text-blue-700 mt-3">

            {{ $statistics['total'] }}

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="text-gray-500">

            Aktif

        </div>

        <div class="text-4xl font-bold text-green-600 mt-3">

            {{ $statistics['aktif'] }}

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="text-gray-500">

            Nonaktif

        </div>

        <div class="text-4xl font-bold text-red-600 mt-3">

            {{ $statistics['nonaktif'] }}

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="text-gray-500">

            Administrator

        </div>

        <div class="text-4xl font-bold text-purple-600 mt-3">

            {{ $statistics['admin'] }}

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="text-gray-500">

            User

        </div>

        <div class="text-4xl font-bold text-indigo-600 mt-3">

            {{ $statistics['user'] }}

        </div>

    </div>

</div>