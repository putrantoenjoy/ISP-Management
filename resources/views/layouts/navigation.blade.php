<nav class="flex flex-col mt-4">
    <a href="{{ route('dashboard') }}"
       class="block px-6 py-3 text-white {{ request()->routeIs('dashboard') ? 'bg-[#6c0ba9]' : 'hover:bg-[#6c0ba9]' }}">
        <i class="bi bi-speedometer"></i> Dashboard
    </a>
    @if(auth()->user()->role == 'admin')
    <a href="{{ route('user.index') }}"
       class="block px-6 py-3 text-white {{ request()->routeIs('user.index') ? 'bg-[#6c0ba9]' : 'hover:bg-[#6c0ba9]' }}">
        <i class="bi bi-person-circle"></i> {{ __('User') }}
    </a>
    @endif
    <a href="{{ route('tagihan.index') }}"
       class="block px-6 py-3 text-white {{ request()->routeIs('tagihan.index') ? 'bg-[#6c0ba9]' : 'hover:bg-[#6c0ba9]' }}">
        <i class="bi bi-cash"></i> {{ __('Tagihan') }}
    </a>
    <a href="{{ route('pelanggan.index') }}"
       class="block px-6 py-3 text-white {{ request()->routeIs('pelanggan.index') ? 'bg-[#6c0ba9]' : 'hover:bg-[#6c0ba9]' }}">
        <i class="bi bi-people"></i> {{ __('Pelanggan') }}
    </a>
    <a href="{{ route('profile.edit') }}"
       class="block px-6 py-3 text-white {{ request()->routeIs('profile.edit') ? 'bg-[#6c0ba9]' : 'hover:bg-[#6c0ba9]' }}">
        <i class="bi bi-person"></i> {{ __('Profile') }}
    </a>
</nav>
<div class="mt-auto border-t border-gray-700">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            onclick="return confirm('Yakin ingin keluar?')"
            class="w-full text-left px-6 py-3 hover:bg-[#6c0ba9]">
            <i class="bi bi-box-arrow-right"></i> Keluar
        </button>

    </form>
</div>