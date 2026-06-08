<x-guest-layout>
    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-2xl p-8">
            <div class="flex justify-center mb-6">
                <div class="w-16 h-16 rounded-2xl bg-purple-600 px-3 flex items-center justify-center">
                    <a class="text-white text-2xl font-bold">IM</a>
                </div>
            </div>
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    Selamat Datang
                </h1>
                <p class="text-gray-500 mt-2 text-sm">
                    Masuk ke akun Anda untuk melanjutkan
                </p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-100 outline-none transition-all duration-300">
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-2">
                        Password
                    </label>
                    <input type="password" name="password" placeholder="Password" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-100 outline-none transition-all duration-300">
                </div>
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>
                <button type="submit"  class="w-full py-3 rounded-xl bg-purple-600 text-white text-sm font-semibold hover:bg-purple-700 transition duration-300 shadow-lg"> Masuk</button>
            </form>
        </div>
    </div>
</x-guest-layout>
