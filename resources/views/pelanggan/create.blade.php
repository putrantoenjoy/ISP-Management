<div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50" x-transition>
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6c0ba9] mb-4">Tambah Pelanggan</h2>
        <form method="POST" action="{{ route('pelanggan.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" placeholder="nama pelanggan" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" placeholder="nomor telepon" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Alamat</label>
                <input type="text" name="alamat" placeholder="alamat" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Paket Internet</label>
                <select name="paket_internet" id="" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
                    <option value="25 mbps">25 mbps</option>
                    <option value="50 mbps">50 mbps</option>
                    <option value="100 mbps">100 mbps</option>
                    <option value="200 mbps">200 mbps</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Harga Paket</label>
                <input type="number" name="harga_paket" placeholder="harga paket" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Status Pelanggan</label>
                <select name="status_pelanggan" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
                    <option value="aktif">Aktif</option>
                    <option value="suspend">Suspend</option>
                    <option value="putus">Putus</option>
                </select>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" @click="open = false" class="text-sm px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="text-sm px-3 py-2 bg-[#6c0ba9] text-white rounded hover:bg-[#5a098c]">Simpan</button>
            </div>
        </form>
    </div>
</div>