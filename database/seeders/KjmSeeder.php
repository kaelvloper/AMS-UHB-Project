<?php

namespace Database\Seeders;

use App\Models\Kjm;
use App\Models\Dosen;
use Illuminate\Database\Seeder;

class KjmSeeder extends Seeder
{
    public function run(): void
    {
        // Create Dosens
        $dosenImam = Dosen::create([
            'nidn' => '0612038501',
            'nama' => 'Pak Imam',
            'gelar' => 'M.Kom.',
            'jabatan' => 'Lektor',
            'status' => 'Aktif'
        ]);

        $dosenAyu = Dosen::create([
            'nidn' => '0625077803',
            'nama' => 'Bu Ayu',
            'gelar' => 'M.T.',
            'jabatan' => 'Asisten Ahli',
            'status' => 'Aktif'
        ]);

        $dosenLina = Dosen::create([
            'nidn' => '0608098205',
            'nama' => 'Lina',
            'gelar' => 'S.Kom.',
            'jabatan' => 'Tenaga Pengajar',
            'status' => 'Aktif'
        ]);

        $dosenBudi = Dosen::create([
            'nidn' => '0612038504',
            'nama' => 'Budi Susanto',
            'gelar' => 'M.Kom.',
            'jabatan' => 'Lektor',
            'status' => 'Aktif'
        ]);

        $dosenSiti = Dosen::create([
            'nidn' => '0612038505',
            'nama' => 'Siti Aminah',
            'gelar' => 'M.T.',
            'jabatan' => 'Asisten Ahli',
            'status' => 'Aktif'
        ]);

        $data = [
            [
                'mata_kuliah' => 'Algoritma Pemrograman',
                'dosen_id' => $dosenImam->id,
                'dosen_pengampu' => 'Pak Imam',
                'nim' => '220101001',
                'jumlah_pertemuan' => 14,
                'is_online' => true,
                'is_offline' => false,
                'dosen_koordinator' => 'Imaduddin Zidane',
                'status_realisasi' => 'Terealisasi',
            ],
            [
                'mata_kuliah' => 'Basis Data',
                'dosen_id' => $dosenAyu->id,
                'dosen_pengampu' => 'Bu Ayu',
                'nim' => '220101002',
                'jumlah_pertemuan' => 12,
                'is_online' => true,
                'is_offline' => true,
                'dosen_koordinator' => 'Fadli Andrea',
                'status_realisasi' => 'Belum',
            ],
            [
                'mata_kuliah' => 'Pemrograman Web',
                'dosen_id' => $dosenLina->id,
                'dosen_pengampu' => 'Lina',
                'nim' => '220101003',
                'jumlah_pertemuan' => 16,
                'is_online' => false,
                'is_offline' => true,
                'dosen_koordinator' => 'Wahyu Kael',
                'status_realisasi' => 'Terealisasi',
            ],
            [
                'mata_kuliah' => 'Jaringan Komputer',
                'dosen_id' => $dosenBudi->id,
                'dosen_pengampu' => 'Budi Susanto, M.Kom.',
                'nim' => '220101004',
                'jumlah_pertemuan' => 14,
                'is_online' => true,
                'is_offline' => false,
                'dosen_koordinator' => 'Pak Imam',
                'status_realisasi' => 'Berjalan',
            ],
            [
                'mata_kuliah' => 'Sistem Operasi',
                'dosen_id' => $dosenSiti->id,
                'dosen_pengampu' => 'Siti Aminah, M.T.',
                'nim' => '220101005',
                'jumlah_pertemuan' => 14,
                'is_online' => false,
                'is_offline' => true,
                'dosen_koordinator' => 'Bu Ayu',
                'status_realisasi' => 'Terealisasi',
            ],
            [
                'mata_kuliah' => 'Kecerdasan Buatan',
                'dosen_id' => $dosenLina->id,
                'dosen_pengampu' => 'Dr. Ahmad Fauzi',
                'nim' => '220101006',
                'jumlah_pertemuan' => 10,
                'is_online' => true,
                'is_offline' => true,
                'dosen_koordinator' => 'Lina',
                'status_realisasi' => 'Berjalan',
            ],
            [
                'mata_kuliah' => 'Pemrograman Mobile',
                'dosen_id' => $dosenImam->id,
                'dosen_pengampu' => 'Rizky Ramadhan, M.Cs.',
                'nim' => '220101007',
                'jumlah_pertemuan' => 14,
                'is_online' => true,
                'is_offline' => false,
                'dosen_koordinator' => 'Pak Imam',
                'status_realisasi' => 'Belum',
            ],
            [
                'mata_kuliah' => 'Cloud Computing',
                'dosen_id' => $dosenBudi->id,
                'dosen_pengampu' => 'Diana Lestari, M.T.',
                'nim' => '220101008',
                'jumlah_pertemuan' => 8,
                'is_online' => true,
                'is_offline' => false,
                'dosen_koordinator' => 'Fadli Andrea',
                'status_realisasi' => 'Berjalan',
            ],
            [
                'mata_kuliah' => 'Cyber Security',
                'dosen_id' => $dosenLina->id,
                'dosen_pengampu' => 'Hendra Wijaya, M.Kom.',
                'nim' => '220101009',
                'jumlah_pertemuan' => 14,
                'is_online' => false,
                'is_offline' => true,
                'dosen_koordinator' => 'Wahyu Kael',
                'status_realisasi' => 'Terealisasi',
            ],
            [
                'mata_kuliah' => 'Data Science',
                'dosen_id' => $dosenAyu->id,
                'dosen_pengampu' => 'Eka Putri, Ph.D.',
                'nim' => '220101010',
                'jumlah_pertemuan' => 14,
                'is_online' => true,
                'is_offline' => true,
                'dosen_koordinator' => 'Bu Ayu',
                'status_realisasi' => 'Belum',
            ],
        ];

        foreach ($data as $item) {
            Kjm::create($item);
        }
    }
}
