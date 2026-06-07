<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#6c0ba9] leading-tight">
            {{ __('Halaman Dashboard') }}
        </h2>
        Selamat datang, {{ Auth::user()->name }}
    </x-slot>

</x-app-layout>
