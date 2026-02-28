<?php

namespace Database\Factories;

use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kehadiran>
 */
class KehadiranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'status' => fake()->randomElement(['Hadir', 'Izin', 'Sakit']),
            'date' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'siswa_id' => Siswa::factory(),
            'kelas_id' => function (array $attributes) {
                $siswa = Siswa::find($attributes['siswa_id']);
                return $siswa?->kelas_id;
            },
            'pelajaran_id' => Pelajaran::factory(),

        ];
    }
}
