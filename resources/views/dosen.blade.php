<x-app-layout>
    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">
                    Data Dosen UHB
                </h2>
                <p class="mt-2 text-sm text-slate-600">
                    Kelola informasi dan status dosen di lingkungan Universitas Harapan Bangsa (UHB).
                </p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                
                <!-- Toolbar -->
                <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Search Bar -->
                    <div class="relative w-full md:w-1/2 lg:w-2/5">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" class="block w-full py-2.5 pl-10 pr-4 text-sm text-slate-900 bg-white rounded-full border border-slate-300 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] transition-colors" placeholder="Cari Nama, NIDN atau Program Studi...">
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-3">
                        <button type="button" class="inline-flex items-center px-4 py-2.5 bg-slate-200 border border-transparent rounded-lg font-medium text-sm text-slate-700 hover:bg-slate-300 focus:outline-none transition-colors">
                            Filter Status
                            <svg class="w-4 h-4 ml-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <button type="button" class="inline-flex items-center px-4 py-2.5 bg-[#1e3a8a] border border-transparent rounded-lg font-medium text-sm text-white hover:bg-[#152a66] focus:outline-none transition-colors shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Dosen
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-600">
                        <thead class="text-xs text-slate-500 bg-slate-100 border-b border-slate-200">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium">Foto Profil (bulat)</th>
                                <th scope="col" class="px-6 py-4 font-medium">Nama Lengkap (dengan Gelar)</th>
                                <th scope="col" class="px-6 py-4 font-medium">NIDN/NIK</th>
                                <th scope="col" class="px-6 py-4 font-medium">Program Studi</th>
                                <th scope="col" class="px-6 py-4 font-medium">Status</th>
                                <th scope="col" class="px-6 py-4 font-medium text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            
                            <!-- Row 1 -->
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <img src="https://ui-avatars.com/api/?name=NK&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">Nama Kamulian, M.SD</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Akademik Stu, PLI</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    010132980001
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    Teknik Informatika
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#1e3a8a] text-white">
                                        Tetap
                                    </span>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <img src="https://ui-avatars.com/api/?name=JK&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">Juan Khahamton, PLD</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Profiasions Stu, LM</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    010008120007
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    Sistem Informasi
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#1e3a8a] text-white">
                                        Tetap
                                    </span>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Row 3 -->
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <img src="https://ui-avatars.com/api/?name=NS&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">Nama Sulan, SMD</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Akader 5kit, LM</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    010008190014
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    Pendidikan Bahasa Inggris
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-semibold bg-[#22c55e] text-white">
                                        LB
                                    </span>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <img src="https://ui-avatars.com/api/?name=AB&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">Anaeli Bunyan, PMD</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Akader Akademik, PhDT</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    010132650009
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    Teknik Informatika
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#1e3a8a] text-white">
                                        Tetap
                                    </span>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        <img src="https://ui-avatars.com/api/?name=NL&background=random" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">Nansel Lian, Ph.D</div>
                                    <div class="text-xs text-slate-500 mt-0.5">Profter Suk, NN</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    010008190018
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    Sistem Informasi
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-semibold bg-[#22c55e] text-white">
                                        LB
                                    </span>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button class="text-slate-400 hover:text-slate-600 focus:outline-none">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer / Pagination -->
                <div class="bg-white px-6 py-4 border-t border-slate-200 flex items-center justify-between">
                    <div class="text-sm text-slate-600 font-medium">
                        Menampilkan 1-10 dari 245 Dosen
                    </div>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-white border border-slate-300 rounded-md text-sm font-medium text-slate-700 hover:bg-slate-50 focus:outline-none transition-colors">
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-white border border-slate-300 rounded-md text-sm font-medium text-slate-700 hover:bg-slate-50 focus:outline-none transition-colors">
                            Next
                        </button>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>
