<?php

namespace App\Http\Controllers;

use App\Models\ManajemenKjm;
use App\Models\Dosen;
use Illuminate\Http\Request;

class ManajemenKjmController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $manajemenKjms = ManajemenKjm::with('dosen')->paginate(10);

        return view('manajemen_kjm.index', compact('dosens', 'manajemenKjms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'total_sks_diambil' => 'required|integer|min:0',
            'semester' => 'required|string|max:255',
        ], [
            'dosen_id.required' => 'Dosen wajib dipilih.',
            'dosen_id.exists' => 'Dosen tidak valid.',
            'total_sks_diambil.required' => 'Total SKS diambil wajib diisi.',
            'semester.required' => 'Semester wajib diisi.',
        ]);

        $kontrak_sks = 12;
        $total_sks_diambil = (int) $request->total_sks_diambil;
        $kelebihan_sks = $total_sks_diambil - $kontrak_sks;
        if ($kelebihan_sks < 0) {
            $kelebihan_sks = 0;
        }

        if ($total_sks_diambil == 12) {
            $status_review = 'Sesuai Kontrak';
        } elseif ($total_sks_diambil > 12) {
            $status_review = 'Kelebihan Jam';
        } else {
            $status_review = 'Kurang Jam';
        }

        ManajemenKjm::create([
            'dosen_id' => $request->dosen_id,
            'kontrak_sks' => $kontrak_sks,
            'total_sks_diambil' => $total_sks_diambil,
            'kelebihan_sks' => $kelebihan_sks,
            'semester' => $request->semester,
            'status_review' => $status_review,
        ]);

        return back()->with('success', 'Kontrak KJM Dosen Berhasil Dievaluasi!');
    }
}
