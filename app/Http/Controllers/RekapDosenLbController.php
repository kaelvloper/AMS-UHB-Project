<?php

namespace App\Http\Controllers;

use App\Models\RekapDosenLb;
use App\Models\Dosen;
use Illuminate\Http\Request;

class RekapDosenLbController extends Controller
{
    public function index()
    {
        $dosens = Dosen::where('status', 'LB')->get();
        $rekapLbs = RekapDosenLb::with('dosen')->paginate(10);

        return view('rekap_lb.index', compact('dosens', 'rekapLbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'total_sks' => 'required|integer|min:1',
            'bulan' => 'required|string|max:255',
            'status_pembayaran' => 'required|in:Belum Dibayar,Proses,Lunas',
        ], [
            'dosen_id.required' => 'Dosen wajib dipilih.',
            'dosen_id.exists' => 'Dosen tidak valid.',
            'total_sks.required' => 'Total SKS wajib diisi.',
            'bulan.required' => 'Bulan wajib diisi.',
            'status_pembayaran.required' => 'Status pembayaran wajib dipilih.',
        ]);

        $total_sks = $request->total_sks;
        $tarif_per_sks = 50000;
        $total_honor = $total_sks * $tarif_per_sks;

        RekapDosenLb::create([
            'dosen_id' => $request->dosen_id,
            'total_sks' => $total_sks,
            'tarif_per_sks' => $tarif_per_sks,
            'total_honor' => $total_honor,
            'bulan' => $request->bulan,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return back()->with('success', 'Rekap Honor Dosen LB Berhasil Disimpan!');
    }
}
