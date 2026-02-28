<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiSiswa>
 */
class NilaiSiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tugas = fake()->numberBetween(60, 100);
        $uts   = fake()->numberBetween(60, 100);
        $uas   = fake()->numberBetween(60, 100);
        $rata = ($tugas + $uts + $uas) / 3;
        return [
            'id' => fake()->uuid(),
            'pelajaran_id' => Pelajaran::factory(),
            'siswa_id' => Siswa::factory(),
            'kelas_id' => function (array $attributes) {
                $siswa = Siswa::find($attributes['siswa_id']);
                return $siswa?->kelas_id;
            },
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas,
            'rata_rata' => $rata
        ];
    }
}
