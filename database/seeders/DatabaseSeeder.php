<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed Lecturers
        $lecturers = [
            [
                'full_name' => 'Arif Setia Sandi',
                'title' => 'S.Kom., M.Kom.',
                'nidn' => '0624088902',
                'study_program' => 'Teknik Informatika',
                'status' => 'LB',
            ],
            [
                'full_name' => 'Kuswantoro',
                'title' => 'M.PdI.',
                'nidn' => '0612108101',
                'study_program' => 'Teknik Informatika',
                'status' => 'Tetap',
            ],
            [
                'full_name' => 'Deny Nugroho Triwibowo',
                'title' => 'S.Kom., M.Kom.',
                'nidn' => '0619049001',
                'study_program' => 'Teknik Informatika',
                'status' => 'LB',
            ],
            [
                'full_name' => 'M. Syaiful Anwar',
                'title' => 'SH., M.Hum.',
                'nidn' => '0602058801',
                'study_program' => 'Teknik Informatika',
                'status' => 'Tetap',
            ],
            [
                'full_name' => 'Purwono',
                'title' => 'S.Kom., M.Kom.',
                'nidn' => '0625078703',
                'study_program' => 'Teknik Informatika',
                'status' => 'LB',
            ],
            [
                'full_name' => 'Rian Ardianto',
                'title' => 'S.Kom., M.Kom.',
                'nidn' => '0611099201',
                'study_program' => 'Teknik Informatika',
                'status' => 'Tetap',
            ],
            [
                'full_name' => 'Imam Ahmad Ashari',
                'title' => 'S.Kom., M.Kom.',
                'nidn' => '0608039302',
                'study_program' => 'Teknik Informatika',
                'status' => 'LB',
            ],
            [
                'full_name' => 'Rosyid Ridlo Al-Hakim',
                'title' => 'S.Kom., S.Si., M.T.',
                'nidn' => '0618059104',
                'study_program' => 'Teknik Informatika',
                'status' => 'LB',
            ],
        ];

        $createdLecturers = [];
        foreach ($lecturers as $l) {
            $createdLecturers[$l['full_name']] = \App\Models\Lecturer::create($l);
        }

        // Seed Teaching Records matching the Excel spreadsheet
        $records = [
            [
                'lecturer_id' => $createdLecturers['Arif Setia Sandi']->id,
                'course_name' => 'Pendidikan Agama',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 2,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-10',
                'material' => 'Pengenalan nilai-nilai ketuhanan dan moralitas dalam kehidupan sehari-hari.',
            ],
            [
                'lecturer_id' => $createdLecturers['Kuswantoro']->id,
                'course_name' => 'Pendidikan Agama',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 2,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-10',
                'material' => 'Pentingnya toleransi dan keberagaman beragama.',
            ],
            [
                'lecturer_id' => $createdLecturers['Deny Nugroho Triwibowo']->id,
                'course_name' => 'Pendidikan Pancasila',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 2,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-11',
                'material' => 'Sejarah perumusan Pancasila sebagai dasar negara.',
            ],
            [
                'lecturer_id' => $createdLecturers['M. Syaiful Anwar']->id,
                'course_name' => 'Pendidikan Pancasila',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 2,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-11',
                'material' => 'Implementasi nilai Pancasila di era globalisasi.',
            ],
            [
                'lecturer_id' => $createdLecturers['Deny Nugroho Triwibowo']->id,
                'course_name' => 'Kewarganegaraan',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 2,
                'uts_method' => 'PBT',
                'uts_student_count' => 38,
                'uas_method' => 'PBT',
                'uas_student_count' => 38,
                'date' => '2026-05-12',
                'material' => 'Hak dan kewajiban warga negara Indonesia.',
            ],
            [
                'lecturer_id' => $createdLecturers['Purwono']->id,
                'course_name' => 'Dasar Pemrograman',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 3,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-13',
                'material' => 'Struktur data dasar, percabangan, perulangan, dan fungsi.',
            ],
            [
                'lecturer_id' => $createdLecturers['Rian Ardianto']->id,
                'course_name' => 'Dasar Pemrograman',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 3,
                'uts_method' => 'CBT',
                'uts_student_count' => 38,
                'uas_method' => 'CBT',
                'uas_student_count' => 38,
                'date' => '2026-05-13',
                'material' => 'Struktur logika algoritma dan implementasi array.',
            ],
            [
                'lecturer_id' => $createdLecturers['Rosyid Ridlo Al-Hakim']->id,
                'course_name' => 'Metodologi Tugas Akhir Bidang Komputer',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 3,
                'uts_method' => 'CBT',
                'uts_student_count' => 11,
                'uas_method' => 'CBT',
                'uas_student_count' => 11,
                'date' => '2026-05-14',
                'material' => 'Teknik perumusan masalah dan penulisan latar belakang penelitian.',
            ],
            [
                'lecturer_id' => $createdLecturers['Arif Setia Sandi']->id,
                'course_name' => 'Metodologi Tugas Akhir Bidang Komputer',
                'semester' => 'Ganjil 2025/2026',
                'credit_hours' => 3,
                'uts_method' => 'CBT',
                'uts_student_count' => 11,
                'uas_method' => 'CBT',
                'uas_student_count' => 11,
                'date' => '2026-05-14',
                'material' => 'Metode pengumpulan data dan analisis data kuantitatif.',
            ],
        ];

        foreach ($records as $r) {
            \App\Models\TeachingRecord::create($r);
        }
    }
}
