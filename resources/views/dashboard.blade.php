<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#6c0ba9] leading-tight">
            {{ __('Halaman Dashboard') }}
        </h2>
        Selamat datang, {{ Auth::user()->name }}
    </x-slot>

    <!-- 4 STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">

        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Total Pelanggan</p>
            <h2 class="text-lg font-bold text-[#6c0ba9]">
                <i class="bi bi-people"></i> 120
            </h2>
        </div>

        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Aktif</p>
            <h2 class="text-lg font-bold text-green-600">
                <i class="bi bi-check-circle"></i> 90
            </h2>
        </div>

        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Suspend</p>
            <h2 class="text-lg font-bold text-yellow-600">
                <i class="bi bi-pause-circle-fill"></i> 20
            </h2>
        </div>

        <div class="bg-white border rounded-lg p-4 shadow-sm">
            <p class="text-sm text-gray-500">Pelanggan Putus</p>
            <h2 class="text-lg font-bold text-red-600">
                <i class="bi bi-x-circle-fill"></i> 10
            </h2>
        </div>

    </div>

    <!-- TAGIHAN (FULL WIDTH) -->
    <div class="mt-6 bg-white border rounded-lg p-4 shadow-sm">
        <p class="text-sm text-gray-500">Total Tagihan Belum Bayar</p>
        <h2 class="text-2xl font-bold text-orange-500">
            <i class="bi bi-cash-stack"></i> Rp 2.500.000
        </h2>
    </div>

    <!-- CHARTS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

        <!-- BAR CHART -->
        <div class="bg-white border rounded-lg shadow-sm p-4">
            <h3 class="text-[#6c0ba9] font-semibold mb-4">
                Statistik Pelanggan (Bar Chart)
            </h3>

            <div class="space-y-3">

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Aktif</span>
                        <span>90%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-green-500 h-4 rounded-full" style="width: 90%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Suspend</span>
                        <span>20%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-yellow-500 h-4 rounded-full" style="width: 20%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Putus</span>
                        <span>10%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-red-500 h-4 rounded-full" style="width: 10%"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- LINE CHART -->
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