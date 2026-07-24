<div class="bg-white rounded-xl shadow p-8 mb-8">

    <h2 class="text-2xl font-bold mb-6">

        Kontrak Terbaru

    </h2>

    <div class="space-y-5">

        @forelse($recentContracts as $contract)

            <div class="flex justify-between border-b pb-4">

                <div>

                    <div class="font-semibold">

                        {{ $contract->tenant->nama_tenant }}

                    </div>

                    <div class="text-gray-500 text-sm">

                        {{ $contract->nomor_kontrak }}

                    </div>

                </div>

                <div class="text-sm text-gray-400">

                    {{ $contract->created_at->diffForHumans() }}

                </div>

            </div>

        @empty

            <div class="text-gray-400">

                Belum ada kontrak.

            </div>

        @endforelse

    </div>

</div>