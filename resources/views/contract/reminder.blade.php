<div class="bg-white rounded-xl shadow p-8 mb-8">

    <h2 class="text-2xl font-bold mb-6">

        Kontrak Akan Berakhir (≤ 30 Hari)

    </h2>

    @forelse($reminderContracts as $contract)

        @php
            $hari = $contract->sisa_hari;
        @endphp

        <div class="flex justify-between items-center border-b py-4">

            <div>

                <div class="font-semibold">

                    {{ $contract->tenant->nama_tenant }}

                </div>

                <div class="text-sm text-gray-500">

                    {{ $contract->nomor_kontrak }}

                </div>

            </div>

            <div>

                @if($hari <= 7)

                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                        {{ $hari }} Hari

                    </span>

                @elseif($hari <= 14)

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                        {{ $hari }} Hari

                    </span>

                @else

                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                        {{ $hari }} Hari

                    </span>

                @endif

            </div>

        </div>

    @empty

        <div class="text-center py-8 text-gray-400">

            Tidak ada kontrak yang akan berakhir.

        </div>

    @endforelse

</div>