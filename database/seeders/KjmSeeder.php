<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kjm;

class KjmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'mata_kuliah' => 'Algoritma Pemrograman',
                'dosen_pengampu' => 'Pak Imam',
                'jumlah_pertemuan' => 14,
                'is_online' => true,
                'is_offline' => false,
                'lampiran_count' => 2,
                'dosen_koordinator' => 'Pak Imam',
                'status_realisasi' => 'Terealisasi',
            ],
            [
                'mata_kuliah' => 'Basis Data',
                'dosen_pengampu' => 'Bu Ayu',
                'jumlah_pertemuan' => 12,
                'is_online' => true,
                'is_offline' => true,
                'lampiran_count' => 1,
                'dosen_koordinator' => 'Bu Ayu',
                'status_realisasi' => 'Belum',
            ],
            [
                'mata_kuliah' => 'Pemrograman Web',
                'dosen_pengampu' => 'Lina',
                'jumlah_pertemuan' => 16,
                'is_online' => false,
                'is_offline' => true,
                'lampiran_count' => 0,
                'dosen_koordinator' => 'Lina',
                'status_realisasi' => 'Terealisasi',
            ],
        ];

        foreach ($data as $item) {
            Kjm::create($item);
        }
    }
}
