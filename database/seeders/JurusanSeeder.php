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
        Jurusan::create([
            'nama_jurusan' => 'Multimedia',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Elektronika Industri',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Otomotif',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Bisnis Sepeda Motor',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Kendaraan Ringan Otomotif',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Pemesinan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Pengelasan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Fabrikasi Logam',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);
    }
}
