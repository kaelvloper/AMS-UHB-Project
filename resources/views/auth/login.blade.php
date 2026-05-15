<x-guest-layout>
    <div class="flex min-h-screen bg-white">
        <!-- Kolom Kiri: Hanya tampil di layar besar (lg) ke atas -->
        <div class="hidden lg:flex lg:w-1/2 bg-blue-700 flex-col items-center justify-center text-white p-12 relative overflow-hidden">
            <!-- Background Decoration (Optional, membuat desain lebih elegan) -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-20">
                <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-white blur-[100px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-blue-300 blur-[100px]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <!-- Logo UHB / Academic Icon -->
                <div class="mb-8 p-4 bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl border border-white/20">
                    <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7"></path>
                    </svg>
                </div>
                
                <h1 class="text-5xl font-extrabold tracking-tight mb-4">AMS</h1>
                <p class="text-2xl font-semibold text-blue-100">Universitas Harapan Bangsa</p>
                <div class="w-16 h-1 bg-blue-400 rounded mt-6 mb-6"></div>
                <p class="text-lg text-blue-100 max-w-md leading-relaxed">
                    Portal Akademik Terpadu untuk mengelola seluruh kegiatan sivitas akademika secara efisien dan terintegrasi.
                </p>
            </div>
        </div>

        <!-- Kolom Kanan: Area Form Login -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 xl:p-24 bg-gray-50/50">
            <div class="w-full max-w-md">
                
                <!-- Logo untuk Mobile (ditampilkan hanya saat layar kecil) -->
                <div class="lg:hidden mb-10 flex flex-col items-center">
                    <div class="bg-blue-600 p-4 rounded-full mb-4 shadow-lg shadow-blue-600/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">AMS - UHB</h2>
                </div>

                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang</h2>
                    <p class="text-gray-500 mt-2 text-sm sm:text-base">Silakan masukkan email dan password akun Anda.</p>
                </div>

                <!-- Komponen validasi bawaan Jetstream -->
                <x-validation-errors class="mb-6" />

                @session('status')
                    <div class="mb-6 font-medium text-sm text-green-600 p-4 bg-green-50 rounded-lg">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                                class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-600 focus:border-blue-600 sm:text-sm transition duration-200">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password" 
                                class="appearance-none block w-full px-4 py-3.5 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-600 focus:border-blue-600 sm:text-sm transition duration-200">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-600 border-gray-300 rounded transition duration-200 cursor-pointer">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700 cursor-pointer select-none">
                                Ingat saya
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-200">
                                    Lupa password?
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition duration-200 hover:-translate-y-0.5">
                            Masuk ke Sistem
                        </button>
                    </div>
                </form>
                
                <!-- Opsi kembali ke Beranda -->
                <div class="mt-8 text-center text-sm text-gray-500">
                    Kembali ke <a href="{{ url('/') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-200">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
