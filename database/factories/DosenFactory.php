<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gelars = [
            'S.Kom., M.Kom.',
            'S.T., M.T.',
            'S.Si., M.Cs.',
            'Dr., S.Kom., M.T.',
            'Dr. Eng., S.T., M.T.',
            'S.Pd., M.Pd.',
            'S.E., M.M.',
            'S.Kep., Ns., M.Kep.',
            'S.Far., Apt., M.Sc.',
            'Dr., M.Kom.',
            'Dr. Ir., M.T.',
            'Prof. Dr., M.Cs.'
        ];

        $programStudis = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Pendidikan Bahasa Inggris',
            'Keperawatan',
            'Farmasi',
            'Manajemen',
            'Hukum'
        ];

        $jabatanAkademiks = [
            'Asisten Ahli',
            'Lektor',
            'Lektor Kepala',
            'Guru Besar'
        ];

        return [
            'nidn' => '06' . $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name('male' | 'female'),
            'gelar' => $this->faker->randomElement($gelars),
            'program_studi' => $this->faker->randomElement($programStudis),
            'jabatan_akademik' => $this->faker->randomElement($jabatanAkademiks),
            'status' => $this->faker->randomElement(['Tetap', 'LB']),
            'status_aktif' => $this->faker->randomElement(['Aktif', 'Cuti']),
            'foto' => null, // defaults to generating dynamic UI Avatar in frontend
        ];
    }
}
