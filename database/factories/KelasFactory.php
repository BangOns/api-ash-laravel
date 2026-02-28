<?php

namespace Database\Factories;

use App\Models\Jurusan;
use App\Models\WaliKelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
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
            'nama_kelas' => fake()->name(),
            'jurusan_id' => Jurusan::factory(),
            'wali_kelas_id' => WaliKelas::factory(),
        ];
    }
}
