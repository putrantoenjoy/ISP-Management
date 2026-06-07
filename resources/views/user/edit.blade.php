<!-- EDIT MODAL -->
<div x-show="openEdit" x-cloak x-transition class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-[#6c0ba9] mb-4">
            Edit User
        </h2>
        <form :action="'/user/' + selectedUser.id" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input type="text" name="name" x-model="selectedUser.name" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" x-model="selectedUser.email" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Role</label>
                <select name="role"
                        x-model="selectedUser.role"
                        class="w-full border rounded px-3 py-2">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" @click="openEdit = false" class="text-sm px-3 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="text-sm px-3 py-2 bg-[#6c0ba9] text-white rounded hover:bg-[#5a098c]">Update</button>
            </div>
        </form>
    </div>
</div>