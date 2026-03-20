<?php

namespace App\Services;

use App\Models\Siswa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class SiswaServices
{
    public function getAllSiswa(int $perPage = 5, string $search = ''): LengthAwarePaginator
    {
        return Cache::remember("siswa.list.{$search}.{$perPage}", 60, function () use ($perPage, $search) {
            $query = Siswa::with(['kelas', 'jurusan'])->when($search, function ($query) use ($search) {
                $query->where('nama_siswa', 'like', "%{$search}%");
            });

            return $query->paginate($perPage);
        });
    }

    public function addSiswa(array $data): Siswa
    {
        return Siswa::create($data);
    }

    public function updateSiswa(array $data, Siswa $siswa): Siswa
    {
        $siswa->update($data);
        return $siswa;
    }

    public function deleteSiswa(Siswa $siswa): bool
    {
        return $siswa->delete();
    }
}
