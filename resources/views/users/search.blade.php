<form
    method="GET"
    class="flex flex-wrap gap-4 mb-6">

    <input

        type="text"

        name="search"

        value="{{ request('search') }}"

        placeholder="Cari nama atau email..."

        class="flex-1 border rounded-lg px-4 py-3">

    <select

        name="role"

        class="border rounded-lg px-4 py-3">

        <option value="">

            Semua Role

        </option>

        <option
            value="admin"
            @selected(request('role')=='admin')>

            Administrator

        </option>

        <option
            value="user"
            @selected(request('role')=='user')>

            User

        </option>

    </select>

    <select
        name="status"
        class="border rounded-xl px-4 py-3 pr-8 w-full"

        <option value="">

            Semua Status

        </option>

        <option
            value="aktif"
            @selected(request('status')=='aktif')>

            Aktif

        </option>

        <option
            value="nonaktif"
            @selected(request('status')=='nonaktif')>

            Nonaktif

        </option>

    </select>

    <button

        class="bg-green-600 hover:bg-green-700 text-white px-6 rounded-lg">

        Cari

    </button>

</form>