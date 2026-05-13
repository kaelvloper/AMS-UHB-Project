<?php

namespace App\Http\Controllers;

use App\Models\Kjm;
use Illuminate\Http\Request;

class KjmController extends Controller
{
    public function index(Request $request)
    {
        // Menyisipkan 2 data dummy statis sementara jika tabel masih kosong
        if (Kjm::count() === 0) {
            Kjm::insert([
                [
                    'mata_kuliah' => 'Pemrograman Web Lanjut',
                    'dosen_pengampu' => 'Budi Susanto, M.Kom.',
                    'jumlah_pertemuan' => 14,
                    'is_online' => true,
                    'is_offline' => false,
                    'lampiran_count' => 2,
                    'dosen_koordinator' => 'Pak Imam',
                    'status_realisasi' => 'Terealisasi',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'mata_kuliah' => 'Sistem Basis Data',
                    'dosen_pengampu' => 'Siti Aminah, M.T.',
                    'jumlah_pertemuan' => 12,
                    'is_online' => false,
                    'is_offline' => true,
                    'lampiran_count' => 0,
                    'dosen_koordinator' => 'Bu Ayu',
                    'status_realisasi' => 'Belum',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }

        $query = Kjm::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('mata_kuliah', 'like', "%{$search}%")
                  ->orWhere('dosen_pengampu', 'like', "%{$search}%")
                  ->orWhere('dosen_koordinator', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $query->where('status_realisasi', $request->status);
        }

        $kjms = $query->latest()->paginate(10);

        $totalMataKuliah = Kjm::count();
        $totalDosen = Kjm::distinct('dosen_pengampu')->count();
        $totalKjm = Kjm::count();
        $terealisasi = Kjm::where('status_realisasi', 'Terealisasi')->count();
        $belumTerealisasi = Kjm::where('status_realisasi', 'Belum')->count();

        return view('kjm.index', compact(
            'kjms', 'totalMataKuliah', 'totalDosen', 'totalKjm', 'terealisasi', 'belumTerealisasi'
        ));
    }

    public function create() {}
    public function show(Kjm $kjm) {}
    public function edit(Kjm $kjm) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'dosen_pengampu' => 'required|string|max:255',
            'jumlah_pertemuan' => 'required|numeric|min:1',
            'lampiran_count' => 'required|numeric|min:0|max:2',
            'dosen_koordinator' => 'required|string|max:255',
            'status_realisasi' => 'required|in:Terealisasi,Belum',
        ]);

        $validated['is_online'] = $request->has('is_online');
        $validated['is_offline'] = $request->has('is_offline');

        Kjm::create($validated);
        return redirect()->route('kjm.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, Kjm $kjm)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'dosen_pengampu' => 'required|string|max:255',
            'jumlah_pertemuan' => 'required|numeric|min:1',
            'lampiran_count' => 'required|numeric|min:0|max:2',
            'dosen_koordinator' => 'required|string|max:255',
            'status_realisasi' => 'required|in:Terealisasi,Belum',
        ]);

        $validated['is_online'] = $request->has('is_online');
        $validated['is_offline'] = $request->has('is_offline');

        $kjm->update($validated);
        return redirect()->route('kjm.index')->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy(Kjm $kjm)
    {
        $kjm->delete();
        return redirect()->route('kjm.index')->with('success', 'Data Berhasil Dihapus');
    }
}
