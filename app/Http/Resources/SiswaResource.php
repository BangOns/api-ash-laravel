<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_siswa' => $this->nama_siswa,
            'jkl' => $this->jkl,
            'kelas' => [
                'id' => $this->kelas->id,
                'nama_kelas' => $this->kelas->nama_kelas
            ],
            'jurusan' => [
                'id' => $this->jurusan->id,
                'nama_jurusan' => $this->jurusan->nama_jurusan
            ]
        ];
    }
}
