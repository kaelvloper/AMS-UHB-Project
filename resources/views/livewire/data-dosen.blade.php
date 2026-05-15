<div class="min-h-screen bg-slate-50 p-6">
    <!-- Main Container -->
    <div class="max-w-7xl mx-auto space-y-6">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Data Dosen UHB</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola informasi dosen, jabatan akademik, dan status keaktifan.</p>
            </div>
            <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Dosen
            </button>
        </div>

        <!-- Filter Section -->
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" class="block w-full p-2.5 pl-10 text-sm text-slate-800 border border-slate-200 rounded-lg bg-slate-50 focus:ring-blue-500 focus:border-blue-500 outline-none" placeholder="Cari nama / NIDN...">
            </div>
            <div class="sm:w-64">
                <select class="bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none">
                    <option selected>Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="cuti">Cuti</option>
                </select>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-slate-600">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium">No</th>
                            <th scope="col" class="px-6 py-4 font-medium">NIDN</th>
                            <th scope="col" class="px-6 py-4 font-medium">Nama Lengkap & Gelar</th>
                            <th scope="col" class="px-6 py-4 font-medium">Jabatan Akademik</th>
                            <th scope="col" class="px-6 py-4 font-medium">Status</th>
                            <th scope="col" class="px-6 py-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 font-medium text-slate-800 whitespace-nowrap">0612038501</td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800">Dr. Budi Santoso, S.Kom., M.Kom.</div>
                            </td>
                            <td class="px-6 py-4">Lektor Kepala</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <button class="font-medium text-blue-600 hover:text-blue-800 mr-4 transition-colors">Edit</button>
                                <button class="font-medium text-red-600 hover:text-red-800 transition-colors">Hapus</button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 font-medium text-slate-800 whitespace-nowrap">0625077803</td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800">Siti Aminah, S.T., M.T.</div>
                            </td>
                            <td class="px-6 py-4">Asisten Ahli</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <button class="font-medium text-blue-600 hover:text-blue-800 mr-4 transition-colors">Edit</button>
                                <button class="font-medium text-red-600 hover:text-red-800 transition-colors">Hapus</button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 font-medium text-slate-800 whitespace-nowrap">0608098205</td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800">Agus Pratama, S.Si., M.Cs.</div>
                            </td>
                            <td class="px-6 py-4">Lektor</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                    Cuti
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <button class="font-medium text-blue-600 hover:text-blue-800 mr-4 transition-colors">Edit</button>
                                <button class="font-medium text-red-600 hover:text-red-800 transition-colors">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Section -->
            <div class="px-6 py-4 border-t border-slate-200 bg-white flex flex-col sm:flex-row items-center justify-between">
                <span class="text-sm text-slate-500 mb-4 sm:mb-0">Menampilkan <span class="font-medium text-slate-800">1</span> sampai <span class="font-medium text-slate-800">3</span> dari <span class="font-medium text-slate-800">3</span> data</span>
                <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 cursor-not-allowed">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-slate-200 bg-blue-50 text-sm font-medium text-blue-600">1</button>
                    <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-slate-200 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 cursor-not-allowed">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
        
    </div>
</div>
