<div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50" x-transition>
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6c0ba9] mb-4">Tambah Tagihan</h2>
        <form method="POST" action="{{ route('tagihan.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Nama Pelanggan</label>
                <select name="pelanggan_id" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Periode Tagihan</label>
                <input type="month" name="periode_tagihan" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Nominal Tagihan</label>
                <input type="number" name="nominal_tagihan" placeholder="nominal tagihan" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Status Pembayaran</label>
                <select name="status_pembayaran" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
                    <option value="belum lunas">Belum Lunas</option>
                    <option value="lunas">Lunas</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Tanggal Pembayaran</label>
                <input type="date" name="tanggal_pembayaran" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" @click="open = false" class="text-sm px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="text-sm px-3 py-2 bg-[#6c0ba9] text-white rounded hover:bg-[#5a098c]">Simpan</button>
            </div>
        </form>
    </div>
</div>