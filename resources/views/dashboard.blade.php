<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#6c0ba9] leading-tight">
            {{ __('Halaman Dashboard') }}
        </h2>
        Selamat datang, {{ Auth::user()->name }}
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Total Pelanggan</p>
            <h2 class="text-lg font-bold text-[#6c0ba9]">
                <i class="bi bi-people"></i> {{ $totalPelanggan }}
            </h2>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Aktif</p>
            <h2 class="text-lg font-bold text-green-600">
                <i class="bi bi-check-circle"></i> {{ $pelangganAktif }}
            </h2>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Suspend</p>
            <h2 class="text-lg font-bold text-yellow-600">
                <i class="bi bi-pause-circle-fill"></i> {{ $pelangganSuspend }}
            </h2>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Putus</p>
            <h2 class="text-lg font-bold text-red-600">
                <i class="bi bi-x-circle-fill"></i> {{ $pelangganPutus }}
            </h2>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 bg-white">
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Total Tagihan Sudah Bayar</p>
            <h2 class="text-2xl font-bold text-green-500">
                <i class="bi bi-cash-stack"></i> Rp {{ number_format($totalTagihanSudahBayar, 0, ',', '.') }}
            </h2>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Total Tagihan Belum Bayar</p>
            <h2 class="text-2xl font-bold text-red-500">
                <i class="bi bi-cash-stack"></i> Rp {{ number_format($totalTagihanBelumBayar, 0, ',', '.') }}
            </h2>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <div class="bg-white border rounded-lg shadow-sm p-4">
            <h3 class="text-[#6c0ba9] font-semibold mb-4">
                Statistik Pelanggan (Bar Chart)
            </h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Aktif</span>
                        <span>{{ $pelangganAktif }} ({{ round($aktifPercent) }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                        <div class="bg-green-500 h-4 rounded-full transition-all duration-700"
                            style="width: {{ $aktifPercent }}%">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Suspend</span>
                        <span>{{ $pelangganSuspend }} ({{ round($suspendPercent) }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                        <div class="bg-yellow-500 h-4 rounded-full transition-all duration-700"
                            style="width: {{ $suspendPercent }}%">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Putus</span>
                        <span>{{ $pelangganPutus }} ({{ round($putusPercent) }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                        <div class="bg-red-500 h-4 rounded-full transition-all duration-700"
                            style="width: {{ $putusPercent }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white border rounded-lg shadow-sm p-4">
            <h3 class="text-[#6c0ba9] font-semibold mb-4">
                Pertumbuhan Pelanggan (Line Chart)
            </h3>
            <div class="flex items-end justify-center gap-2 h-40">
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-10"></div>
                    <span class="text-xs mt-1">Jan</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-16"></div>
                    <span class="text-xs mt-1">Feb</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-24"></div>
                    <span class="text-xs mt-1">Mar</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-20"></div>
                    <span class="text-xs mt-1">Apr</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-28"></div>
                    <span class="text-xs mt-1">Mei</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Jun</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Jul</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Agt</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Sep</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Okt</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Nov</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-[#6c0ba9] w-8 h-32"></div>
                    <span class="text-xs mt-1">Des</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>