<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama_jurusan' => 'Desain Komunikasi Visual',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Sosial dan Politik',
        ]);
    }
}
