<?php

namespace Database\Factories;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
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
            'nama_siswa' => fake()->name(),
            'jkl' => fake()->randomElement(['L', 'P']),
            'kelas_id' => Kelas::factory(),
            'jurusan_id' => function (array $attributes) {
                $kelas = Kelas::find($attributes['kelas_id']);
                return $kelas?->jurusan_id;
            },
        ];
    }
}
