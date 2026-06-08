<x-app-layout>
    <div x-data="{ open: false, openEdit: false, selectedTagihan: null }" x-cloak>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-[#6c0ba9] leading-tight">
                {{ __('Halaman Tagihan') }}
            </h2>
            Selamat datang, {{ Auth::user()->name }}
        </x-slot>
        <div class="">
            @if ($errors->any())
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800 shadow-sm">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="font-semibold"><i class="bi bi-exclamation-triangle"></i> Gagal menyimpan data</h3>
                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-700"><i class="bi bi-x-circle"></i></button>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="mb-4 flex items-center justify-between rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 shadow-sm" role="alert">
                    <div class="flex items-center gap-3">
                        <span class="font-medium">
                           <i class="bi bi-check-circle"></i> {{ session('success') }}
                        </span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="ml-4 text-green-500 transition hover:text-green-700"><i class="bi bi-x-circle"></i></button>
                </div>
            @endif
            <div class="flex items-center justify-between mb-4">
                <button @click="open = true" class="bg-[#6c0ba9] hover:bg-[#880ed4] text-white px-4 text-sm py-2 rounded"> <i class="bi bi-plus-circle"></i> Tambah Tagihan</button>
                <form method="GET" action="{{ route('tagihan.index') }}" x-data x-ref="searchForm">
                    <input x-init="$el.focus()" type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." class="text-sm border border-[#6c0ba9] focus:ring-2 focus:ring-[#880ed4] outline-none rounded py-2 px-4" @input.debounce.500ms="$refs.searchForm.submit()">
                </form>
            </div>
        </div>
        <div class="relative overflow-x-auto w-full bg-white shadow-none rounded-lg border border-gray-200" style="margin-top: 1rem;">
            <table class="min-w-max text-sm text-left">
                <thead class="bg-purple-100 border-b border-purple-200">
                    <tr style="background: linear-gradient(to bottom, #f7edff 0%, #faf5ff 40%, #ffffff 100%);">
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="table-checkbox" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500">
                                <label for="table-checkbox" class="sr-only">Table checkbox</label>
                            </div>
                        </th>
                        <th class="px-6 py-3 font-medium text-[#6c0ba9]">
                            <a href="{{ route('tagihan.index', [ 'sort' => 'pelanggan.nama', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc', 'search' => request('search'), 'page' => request('page')]) }}" class="flex justify-between items-center w-full text-[#6c0ba9]">
                                <div>
                                    <i class="bi bi-person me-1"></i>
                                    <span>Pelanggan</span>
                                </div>
                                <i class="bi bi-filter-right"></i>
                            </a>
                        </th>
                        <th class="px-6 py-3 font-medium text-[#6c0ba9]">
                            <a href="{{ route('tagihan.index', [ 'sort' => 'periode_tagihan', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc', 'search' => request('search'), 'page' => request('page')]) }}" class="flex justify-between items-center w-full text-[#6c0ba9]">
                                <div>
                                    <i class="bi bi-cash me-1"></i>
                                    <span>Periode Tagihan</span>
                                </div>
                                <i class="bi bi-filter-right"></i>
                            </a>
                        </th>
                        <th class="px-6 py-3 font-medium text-[#6c0ba9]">
                            <a href="{{ route('tagihan.index', [ 'sort' => 'nominal_tagihan', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc', 'search' => request('search'), 'page' => request('page')]) }}" class="flex justify-between items-center w-full text-[#6c0ba9]">
                                <div>
                                    <i class="bi bi-currency-dollar me-1"></i>
                                    <span>Nominal Tagihan</span>
                                </div>
                                <i class="bi bi-filter-right"></i>
                            </a>
                        </th>
                        <th class="px-6 py-3 font-medium text-[#6c0ba9]">
                            <a href="{{ route('tagihan.index', [ 'sort' => 'status_pembayaran', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc', 'search' => request('search'), 'page' => request('page')]) }}" class="flex justify-between items-center w-full text-[#6c0ba9]">
                                <div>
                                    <i class="bi bi-check-circle me-1"></i>
                                    <span>Status Pembayaran</span>
                                </div>
                                <i class="bi bi-filter-right"></i>
                            </a>
                        </th>
                        <th class="px-6 py-3 font-medium text-[#6c0ba9]">
                            <a href="{{ route('tagihan.index', [ 'sort' => 'tanggal_pembayaran', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc', 'search' => request('search'), 'page' => request('page')]) }}" class="flex justify-between items-center w-full text-[#6c0ba9]">
                                <div>
                                    <i class="bi bi-calendar me-1"></i>
                                    <span>Tanggal Pembayaran</span>
                                </div>
                                <i class="bi bi-filter-right"></i>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            <i class="bi bi-gear"></i> Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-200">
                    @foreach ($tagihans as $tagihan)
                        <tr class="group hover:bg-[#6c0ba9] hover:text-white text-dark transition">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-{{ $tagihan->id }}" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500">
                                    <label for="table-checkbox-{{ $tagihan->id }}" class="sr-only">
                                        Table checkbox
                                    </label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $tagihan->pelanggan->nama_pelanggan }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tagihan->periode_tagihan->format('M Y') }}
                            </td>
                            <td class="px-6 py-4">
                               Rp {{ number_format($tagihan->nominal_tagihan, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tagihan->status_pembayaran === 'lunas' ? 'Lunas' : 'Belum Lunas' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tagihan->tanggal_pembayaran?->format('d M Y') ?? '-' }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin membayar tagihan ini?')">
                                    @csrf
                                    @method('PATCH')
                                    @if($tagihan->status_pembayaran === 'lunas')
                                        <button type="submit"
                                            class="flex items-center gap-1 px-3 py-1 rounded bg-green-400 text-white cursor-not-allowed">
                                            <i class="bi bi-check-circle"></i>
                                            Lunas
                                        </button>
                                    @else
                                        <button type="submit"
                                            class="flex items-center gap-1 px-3 py-1 rounded bg-[#6c0ba9] text-white hover:bg-white hover:text-[#6c0ba9] transition">
                                            <i class="bi bi-check-circle"></i>
                                            Bayar
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $tagihans->links('components.pagination') }}
        </div>
        @include('tagihan.create')
    </div>
</x-app-layout>