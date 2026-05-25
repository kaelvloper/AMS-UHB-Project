<?php

namespace App\Http\Controllers;

use App\Models\RekapHonorUjian;
use App\Models\Dosen;
use Illuminate\Http\Request;

class RekapHonorUjianController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $honorUjians = RekapHonorUjian::with('dosen')->paginate(10);

        return view('honor_ujian.index', compact('dosens', 'honorUjians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'jumlah_sesi' => 'required|integer|min:1',
            'jenis_ujian' => 'required|in:UTS,UAS',
            'semester' => 'required|string|max:255',
        ], [
            'dosen_id.required' => 'Dosen wajib dipilih.',
            'dosen_id.exists' => 'Dosen tidak valid.',
            'jumlah_sesi.required' => 'Jumlah sesi wajib diisi.',
            'jenis_ujian.required' => 'Jenis ujian wajib dipilih.',
            'semester.required' => 'Semester wajib diisi.',
        ]);

        $jumlah_sesi = (int) $request->jumlah_sesi;
        $tarif_per_sesi = 75000;
        $total_honor_ujian = $jumlah_sesi * $tarif_per_sesi;

        RekapHonorUjian::create([
            'dosen_id' => $request->dosen_id,
            'jumlah_sesi' => $jumlah_sesi,
            'tarif_per_sesi' => $tarif_per_sesi,
            'total_honor_ujian' => $total_honor_ujian,
            'jenis_ujian' => $request->jenis_ujian,
            'semester' => $request->semester,
        ]);

        return back()->with('success', 'Honor Pengawasan Ujian Berhasil Direkap!');
    }
}
