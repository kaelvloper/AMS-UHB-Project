<?php

namespace App\Http\Controllers;

use App\Models\RekapNilaiMahasiswa;
use Illuminate\Http\Request;

class RekapNilaiMahasiswaController extends Controller
{
    public function index()
    {
        $rekapNilais = RekapNilaiMahasiswa::paginate(10);

        return view('rekap_nilai.index', compact('rekapNilais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'nilai_angka' => 'required|integer|min:0|max:100',
        ], [
            'nama_mahasiswa.required' => 'Nama mahasiswa wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'mata_kuliah.required' => 'Mata kuliah wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'nilai_angka.required' => 'Nilai angka wajib diisi.',
            'nilai_angka.min' => 'Nilai angka minimal 0.',
            'nilai_angka.max' => 'Nilai angka maksimal 100.',
        ]);

        $nilai_angka = (int) $request->nilai_angka;
        
        if ($nilai_angka >= 80) {
            $nilai_huruf = 'A';
        } elseif ($nilai_angka >= 70) {
            $nilai_huruf = 'B';
        } elseif ($nilai_angka >= 60) {
            $nilai_huruf = 'C';
        } elseif ($nilai_angka >= 50) {
            $nilai_huruf = 'D';
        } else {
            $nilai_huruf = 'E';
        }

        RekapNilaiMahasiswa::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'mata_kuliah' => $request->mata_kuliah,
            'kelas' => $request->kelas,
            'nilai_angka' => $nilai_angka,
            'nilai_huruf' => $nilai_huruf,
        ]);

        return back()->with('success', 'Rekap Nilai Mahasiswa Berhasil Disimpan!');
    }
}
