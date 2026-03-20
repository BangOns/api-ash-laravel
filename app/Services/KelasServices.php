<?php

namespace App\Services;

use App\Models\Kelas;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class KelasServices
{
    public function getAllKelas(int $perPage = 5, string $search = ''): LengthAwarePaginator
    {
        return Cache::remember("kelas.list.{$search}.{$perPage}", 60, function () use ($perPage, $search) {
            $query = Kelas::with(['jurusan', 'wali_kelas'])->when($search, function ($query) use ($search) {
                $query->where('nama_kelas', 'like', "%{$search}%");
            });

            return $query->paginate($perPage);
        });
    }

    public function addKelas(array $data): Kelas
    {
        return Kelas::create($data);
    }

    public function updateKelas(array $data, Kelas $kelas): Kelas
    {
        $kelas->update($data);
        return $kelas;
    }

    public function deleteKelas(Kelas $kelas): bool
    {
        return $kelas->delete();
    }
}
