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
        $gelars = ['M.Kom.', 'M.T.', 'M.Cs.', 'S.Kom.', 'S.T.', 'Ph.D.', 'Dr.'];
        $jabatans = ['Tenaga Pengajar', 'Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Guru Besar'];
        
        return [
            'nidn' => $this->faker->unique()->numerify('06##########'),
            'nama' => $this->faker->name(),
            'gelar' => $this->faker->randomElement($gelars),
            'jabatan' => $this->faker->randomElement($jabatans),
            'status' => $this->faker->randomElement(['Aktif', 'Aktif', 'Aktif', 'Cuti']), // More likely to be active
        ];
    }
}
