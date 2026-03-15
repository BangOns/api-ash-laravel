<?php

namespace App\Services;

use App\Models\Jurusan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class JurusanServices
{
    public function getAllJurusan(int $perPage = 5): LengthAwarePaginator
    {
        return Jurusan::latest()->paginate($perPage);
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
