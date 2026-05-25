<?php

namespace App\Http\Controllers;

use App\Models\DistribusiPerkuliahan;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DistribusiPerkuliahanController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $distribusis = DistribusiPerkuliahan::with('dosen')->paginate(10);

        return view('distribusi.index', compact('dosens', 'distribusis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'mata_kuliah' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruangan' => 'required|string|max:255',
            'SKS' => 'required|integer|min:1|max:6',
        ], [
            'dosen_id.required' => 'Dosen wajib dipilih.',
            'dosen_id.exists' => 'Dosen tidak valid.',
            'mata_kuliah.required' => 'Mata kuliah wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'hari.required' => 'Hari wajib diisi.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'ruangan.required' => 'Ruangan wajib diisi.',
            'SKS.required' => 'SKS wajib diisi.',
        ]);

        // Cek bentrok jadwal dosen
        $dosenConflict = DistribusiPerkuliahan::where('dosen_id', $request->dosen_id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($dosenConflict) {
            return back()->with('error', 'Jadwal Dosen Bentrok dengan Kuliah Lain!')->withInput();
        }

        // Cek bentrok ruangan
        $ruanganConflict = DistribusiPerkuliahan::where('ruangan', $request->ruangan)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($ruanganConflict) {
            return back()->with('error', 'Ruangan sudah terpakai oleh kelas lain!')->withInput();
        }

        DistribusiPerkuliahan::create($request->all());

        return back()->with('success', 'Distribusi Kuliah Berhasil Di-Plotting!');
    }
}
