<?php

namespace App\Http\Controllers;

use App\Models\RekapKegiatanUhb;
use Illuminate\Http\Request;

class RekapKegiatanUhbController extends Controller
{
    public function index()
    {
        $rekapKegiatans = RekapKegiatanUhb::paginate(10);

        return view('rekap_kegiatan.index', compact('rekapKegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|in:Seminar,Workshop,Rapat Koordinasi,Pengabdian',
            'tanggal_kegiatan' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status_kegiatan' => 'required|in:Terencana,Selesai',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'jenis_kegiatan.required' => 'Jenis kegiatan wajib dipilih.',
            'jenis_kegiatan.in' => 'Jenis kegiatan tidak valid.',
            'tanggal_kegiatan.required' => 'Tanggal kegiatan wajib diisi.',
            'tanggal_kegiatan.date' => 'Tanggal kegiatan tidak valid.',
            'tempat.required' => 'Tempat kegiatan wajib diisi.',
            'status_kegiatan.required' => 'Status kegiatan wajib dipilih.',
            'status_kegiatan.in' => 'Status kegiatan tidak valid.',
        ]);

        RekapKegiatanUhb::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'tempat' => $request->tempat,
            'status_kegiatan' => $request->status_kegiatan,
        ]);

        return back()->with('success', 'Rekap Kegiatan Kampus Berhasil Didokumentasikan!');
    }
}
