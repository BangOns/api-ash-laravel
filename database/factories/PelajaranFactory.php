<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelajaran>
 */
class PelajaranFactory extends Factory
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
            'nama_pelajaran' => fake()->name(),
            'kelas_id' => Kelas::factory(),
            'wali_kelas_id' => function (array $attributes) {
                $kelas = Kelas::find($attributes['kelas_id']);
                return $kelas?->wali_kelas_id;
            },
        ];
    }
}
