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
                Statistik Pelanggan
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
                <div>
                    
                </div>
            </div>
        </div>
        <div class="bg-white border rounded-lg shadow-sm p-4">
            <h3 class="text-[#6c0ba9] font-semibold mb-4">
                Grafik Total Tagihan per Bulan
            </h3>
            <div id="chart" class="relative h-64 w-full border-b"></div>
        </div>
        @php
            $labels = $data->map(fn($item) =>
                \Carbon\Carbon::createFromFormat('Y-m', $item->periode)->format('M')
            );
            $values = $data->map(fn($item) => $item->total_nominal);
        @endphp

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
        $(function () {

            const labels = {!! json_encode($labels) !!};
            const values = {!! json_encode($values) !!};

            const $chart = $("#chart");

            const width = $chart.width();
            const height = $chart.height();

            const max = Math.max(...values);
            const min = Math.min(...values);
            const range = max - min || 1;

            function getX(i) {
                return (i / (values.length - 1)) * (width - 40) + 20;
            }

            function getY(val) {
                return height - ((val - min) / range) * (height - 40) - 20;
            }
            $chart.empty();
            let points = [];
            values.forEach((val, i) => {
                const x = getX(i);
                const y = getY(val);

                points.push({ x, y });
                $chart.append(`
                    <div class="dot"
                        title="${labels[i]}: Rp ${val.toLocaleString('id-ID')}"
                        style="
                            position:absolute;
                            width:10px;
                            height:10px;
                            background:#6c0ba9;
                            border-radius:50%;
                            left:${x}px;
                            top:${y}px;
                            transform:translate(-50%, -50%);
                            cursor:pointer;
                        ">
                    </div>
                `);

                $chart.append(`
                    <div style="
                        position:absolute;
                        left:${x}px;
                        bottom:-20px;
                        transform:translateX(-50%);
                        font-size:12px;
                        color:#666;
                    ">
                        ${labels[i]}
                    </div>
                `);
            });

            for (let i = 0; i < points.length - 1; i++) {

                const x1 = points[i].x;
                const y1 = points[i].y;
                const x2 = points[i + 1].x;
                const y2 = points[i + 1].y;

                const length = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
                const angle = Math.atan2(y2 - y1, x2 - x1) * 180 / Math.PI;

                $chart.append(`
                    <div style="
                        position:absolute;
                        width:${length}px;
                        height:2px;
                        background:#6c0ba9;
                        left:${x1}px;
                        top:${y1}px;
                        transform-origin:0 0;
                        transform:rotate(${angle}deg);
                    "></div>
                `);
            }

        });
        </script>
    </div>
</x-app-layout>