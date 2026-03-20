<?php

namespace App\Services;

use App\Models\Jurusan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use function Laravel\Prompts\search;

class JurusanServices
{
    public function getAllJurusan(int $perPage = 5, string $search = ''): LengthAwarePaginator
    {
        return Cache::remember("jurusan.list.{$search}.{$perPage}", 60, function () use ($perPage, $search) {
            $query = Jurusan::when($search, function ($query) use ($search) {
                $query->where('nama_jurusan', 'like', "%{$search}%");
            });
            return $query->paginate($perPage);
        });
    }

    public function addJurusan(array $data): Jurusan
    {
        return Jurusan::create($data);
    }

    public function updateJurusan(array $data, Jurusan $jurusan): Jurusan
    {
        $jurusan->update($data);
        return $jurusan;
    }

    public function deleteJurusan(Jurusan $jurusan): bool
    {
        return $jurusan->delete();
    }
}
