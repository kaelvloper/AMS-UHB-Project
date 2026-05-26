<?php

namespace App\Livewire;

use Livewire\Component;

class NilaiMahasiswaModule extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $students = [];
    public string $search = '';

    public function mount(): void
    {
        $this->students = $this->generateData();
    }

    /** @return array<int, array<string, mixed>> */
    private function generateData(): array
    {
        $lkmTemplates = [
            [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80], //  0 – all good
            [75, 78, 80, 75, 80, 80, 75, 80, 78, 80, 75, 80, 80, 78, 80], //  1 – varied good
            [80, 80, 80,  0, 80, 80, 80, 80, 80, 80, 80, 80,  0, 80, 80], //  2 – 2 missing
            [75, 75,  0,  0, 75, 80, 75, 80, 80, 75, 80, 75, 80, 75, 80], //  3 – some missing
            [80,  0, 80, 80, 80, 80,  0, 80, 80, 80, 80, 80, 80, 80,  0], //  4 – 3 missing
            [ 0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0], //  5 – all 0
            [78, 80, 78, 78, 80, 80, 78, 80, 80, 80, 78, 80, 80, 80, 78], //  6 – good
            [80, 80, 80, 80,  0, 80, 80, 80, 80, 80, 80, 80, 80,  0, 80], //  7 – 2 missing
            [75, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75], //  8 – all 75
            [80, 80, 80, 80, 80, 80, 80, 80, 80,  0, 80, 80, 80, 80, 80], //  9 – 1 missing
            [75, 80, 75, 80, 75, 80, 75, 80, 75, 80, 75, 80, 75, 80, 75], // 10 – alternating
            [75, 78, 80, 75, 80, 80, 80, 80,  0, 80, 80, 75, 80, 80, 80], // 11 – mostly good
            [ 0, 80, 80,  0, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80], // 12 – 2 missing start
            [80, 80,  0, 80, 80,  0, 80, 80, 80, 80, 80, 80, 80,  0, 80], // 13 – 3 spread missing
            [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80], // 14 – all good
            [78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78], // 15 – all 78
            [80, 80, 80,  0,  0, 80, 80, 80, 80, 80, 80,  0, 80, 80, 80], // 16 – 3 missing
            [75, 80, 80, 80, 80, 75, 80, 75, 80, 80, 80, 80, 75, 80, 80], // 17 – mostly 80
        ];

        /**
         * Each row: [nama, prodi, fakultas, angkatan, kode_prodi (2-digit)]
         * NIM format: [angkatan][kode_prodi][seq 3-digit per prodi]
         */
        $rawData = [
            // ============================================================
            //  FAK. TEKNOLOGI & SAINS
            // ============================================================

            // -- S1 Informatika (kode 01) --
            ['AKHMAD NOVAL KHUSEN',         'S1 Informatika',          'Teknologi & Sains', '2020', '01'],
            ['ARIF DERMAWAN',                'S1 Informatika',          'Teknologi & Sains', '2021', '01'],
            ['APRIZA FREDIANSYAH',           'S1 Informatika',          'Teknologi & Sains', '2021', '01'],
            ['EVAN IRMANSYAH WICAKSONO',     'S1 Informatika',          'Teknologi & Sains', '2022', '01'],
            ['FADLI ANADREA',                'S1 Informatika',          'Teknologi & Sains', '2023', '01'],
            ['FAYYAZ AQEEL NAQIB',           'S1 Informatika',          'Teknologi & Sains', '2024', '01'],

            // -- S1 Sistem Informasi (kode 02) --
            ['GALIH RESTU JAYA SAPUTRA',     'S1 Sistem Informasi',     'Teknologi & Sains', '2021', '02'],
            ['KENDRIAN SAPUTRA',             'S1 Sistem Informasi',     'Teknologi & Sains', '2022', '02'],
            ['KHAFID DAYAN JATI',            'S1 Sistem Informasi',     'Teknologi & Sains', '2022', '02'],
            ['LINA ENDARWATI',               'S1 Sistem Informasi',     'Teknologi & Sains', '2023', '02'],
            ['NISRINA KAMILIA PUTRI',        'S1 Sistem Informasi',     'Teknologi & Sains', '2024', '02'],

            // -- S1 Teknik Robotika & KA (kode 03) --
            ['ROSITA ZENI SAPUTRI',          'S1 Teknik Robotika & KA', 'Teknologi & Sains', '2022', '03'],
            ['SUWITO RAHARJO',               'S1 Teknik Robotika & KA', 'Teknologi & Sains', '2023', '03'],
            ['TEGAR RIFA\'I PRATAMA',        'S1 Teknik Robotika & KA', 'Teknologi & Sains', '2024', '03'],

            // ============================================================
            //  FAK. ILMU SOSIAL
            // ============================================================

            // -- S1 Manajemen (kode 04) --
            ['FARHATUN NISA SALSABILA',      'S1 Manajemen',            'Ilmu Sosial',       '2021', '04'],
            ['HANAN BAYU ANGGORO',           'S1 Manajemen',            'Ilmu Sosial',       '2022', '04'],
            ['NATIYA CHOYRUNNISA',           'S1 Manajemen',            'Ilmu Sosial',       '2023', '04'],
            ['ARYA SUKMA ARIFIN',            'S1 Manajemen',            'Ilmu Sosial',       '2024', '04'],

            // -- S1 Hukum (kode 05) --
            ['DENNY YULLOH',                 'S1 Hukum',                'Ilmu Sosial',       '2020', '05'],
            ['DWI SATRIO NUGROHO',           'S1 Hukum',                'Ilmu Sosial',       '2021', '05'],
            ['AHMAD FAUZAN HAKIM',           'S1 Hukum',                'Ilmu Sosial',       '2022', '05'],
            ['BELLA ANDRIYANI',              'S1 Hukum',                'Ilmu Sosial',       '2023', '05'],

            // -- S1 Akuntansi (kode 06) --
            ['CITRA DEWI PERMATA',           'S1 Akuntansi',            'Ilmu Sosial',       '2021', '06'],
            ['DANANG PRASETYO UTOMO',        'S1 Akuntansi',            'Ilmu Sosial',       '2022', '06'],
            ['EKA RAHMAWATI',                'S1 Akuntansi',            'Ilmu Sosial',       '2023', '06'],

            // ============================================================
            //  FAK. KESEHATAN
            // ============================================================

            // -- S1 Keperawatan (kode 07) --
            ['ELISA PUSPITA DEWI',           'S1 Keperawatan',          'Kesehatan',         '2021', '07'],
            ['FAISAL NUGRAHA PUTRA',         'S1 Keperawatan',          'Kesehatan',         '2022', '07'],
            ['GITA RAHAYU SARI',             'S1 Keperawatan',          'Kesehatan',         '2022', '07'],
            ['HALIMAH NUR AISYAH',           'S1 Keperawatan',          'Kesehatan',         '2023', '07'],

            // -- S1 Farmasi (kode 08) --
            ['INDRA KURNIAWAN SANTOSO',      'S1 Farmasi',              'Kesehatan',         '2020', '08'],
            ['JOKO SUSANTO',                 'S1 Farmasi',              'Kesehatan',         '2021', '08'],
            ['KARTIKA SARI DEWI',            'S1 Farmasi',              'Kesehatan',         '2022', '08'],
            ['LAILA MUFIDAH',                'S1 Farmasi',              'Kesehatan',         '2023', '08'],
        ];

        $seqByProdi = [];

        return collect($rawData)->map(function (array $row, int $i) use ($lkmTemplates, &$seqByProdi): array {
            [$nama, $prodi, $fakultas, $angkatan, $kode] = $row;

            // Sequential NIM per prodi
            $seqByProdi[$prodi] = ($seqByProdi[$prodi] ?? 0) + 1;
            $nim = $angkatan . $kode . str_pad((string) $seqByProdi[$prodi], 3, '0', STR_PAD_LEFT);

            // LKM scores
            $scores = $lkmTemplates[$i % count($lkmTemplates)];

            // Presensi P1-P16, default 'H'
            $presensi = collect(range(1, 16))
                ->mapWithKeys(fn(int $p): array => ["P{$p}" => 'H'])
                ->all();

            // LKM P1-P15
            $lkm = collect(range(1, 15))
                ->mapWithKeys(fn(int $p): array => ["P{$p}" => $scores[$p - 1]])
                ->all();

            $validScores    = array_filter($scores, fn($s) => $s > 0);
            $nilaiAkhirLkm  = count($validScores) > 0
                ? round(array_sum($validScores) / count($scores), 1)
                : 0;

            return [
                'id'              => $i + 1,
                'nim'             => $nim,
                'nama'            => $nama,
                'prodi'           => $prodi,
                'fakultas'        => $fakultas,
                'angkatan'        => $angkatan,
                'presensi'        => $presensi,
                'lkm'             => $lkm,
                'nilai_akhir_lkm' => $nilaiAkhirLkm,
                'uts'             => rand(65, 95),
                'uas'             => rand(65, 95),
                'nilai_kel'       => rand(70, 95),
                'partisipatif'    => rand(75, 100),
            ];
        })->values()->all();
    }

    public function saveData(array $updatedStudents): void
    {
        $this->students = $updatedStudents;
        session()->flash('success', 'Data nilai berhasil disimpan!');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.nilai-mahasiswa-module');
    }
}
