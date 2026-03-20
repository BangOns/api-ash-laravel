<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Kehadiran;
use App\Models\Kelas;
use App\Models\NilaiSiswa;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
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
        $this->call([
            JurusanSeeder::class,
            WaliKelasSeeder::class,
            JadwalSeeder::class,
        ]);
        Kelas::factory(10)->recycle([
            WaliKelas::all(),
            Jurusan::all()
        ])->create();
        Siswa::factory(10)->recycle([
            Kelas::all(),
            Jurusan::all()
        ])->create();
        Pelajaran::factory(10)->recycle(Kelas::all(), WaliKelas::all())->create();
        Kehadiran::factory(10)->recycle([
            Siswa::all(),
            Kelas::all(),
            Pelajaran::all()
        ])->create();
        NilaiSiswa::factory(10)->recycle([
            Siswa::all(),
            Kelas::all(),
            Pelajaran::all()
        ])->create();
    }
}
