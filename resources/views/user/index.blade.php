<x-app-layout>
    <div x-data="{ open: false, openEdit: false, selectedUser: null }" x-cloak>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-[#6c0ba9] leading-tight">
                {{ __('Halaman User') }}
            </h2>
            Selamat datang, {{ Auth::user()->name }}
        </x-slot>
        <div class="flex items-center justify-between mb-4">
            <button @click="open = true" class="bg-[#6c0ba9] hover:bg-[#880ed4] text-white px-4 text-sm py-2 rounded"> <i class="bi bi-plus-circle"></i> Tambah User</button>
            <input type="text" placeholder="Cari..." class="text-sm border border-[#6c0ba9] focus:ring-2 focus:ring-[#880ed4] outline-none rounded py-2 px-4">
        </div>
        <div class="relative overflow-x-auto bg-white shadow-none rounded-lg border border-gray-200" style="margin-top: 1rem;">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr style="background: linear-gradient(to bottom, #f7edff 0%, #faf5ff 40%, #ffffff 100%);">
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="table-checkbox" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500">
                                <label for="table-checkbox" class="sr-only">Table checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            Tanggal Dibuat
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium font-semibold text-[#6c0ba9]">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="group hover:bg-[#6c0ba9] hover:text-white text-dark transition">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="table-checkbox-{{ $user->id }}" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-white focus:ring-2 focus:ring-blue-500">
                                    <label for="table-checkbox-{{ $user->id }}" class="sr-only">
                                        Table checkbox
                                    </label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at->format('d-m-Y') }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="#" @click.prevent="openEdit = true; selectedUser = {{ $user }}" class="flex items-center gap-1 font-medium text-[#6c0ba9] group-hover:text-white transition"><i class="bi bi-pencil"></i>Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus user ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    @if($user->name === 'Administrator')
                                    <button type="submit" disabled class="ms-3 font-medium text-gray-400 cursor-not-allowed">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                    @else
                                    <button type="submit"
                                        class="ms-3 font-medium text-red-600 hover:text-white transition">
                                         <i class="bi bi-trash"></i> Remove
                                    </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('user.create')
        @include('user.edit')
    </div>
</x-app-layout>