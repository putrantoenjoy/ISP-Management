<div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50" x-transition>
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6c0ba9] mb-4">Tambah User</h2>
        <form method="POST" action="{{ route('user.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input type="text" name="name" placeholder="nama" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" placeholder="email" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" placeholder="password" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="konfirmasi password" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-[#880ed4] outline-none">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" @click="open = false" class="text-sm px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="text-sm px-3 py-2 bg-[#6c0ba9] text-white rounded hover:bg-[#5a098c]">Simpan</button>
            </div>
        </form>
    </div>
</div>