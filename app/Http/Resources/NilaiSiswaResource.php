<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiSiswaResource extends JsonResource
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
            'tugas' => $this->tugas,
            'uts' => $this->uts,
            'uas' => $this->uas,
            'rata_rata' => $this->rata_rata,
            'siswa' => [
                'id' => $this->siswa->id,
                'nama_siswa' => $this->siswa->nama_siswa,
            ],
            'kelas' => [
                'id' => $this->kelas->id,
                'nama_kelas' => $this->kelas->nama_kelas
            ],
            'pelajaran' => [
                'id' => $this->pelajaran->id,
                'nama_pelajaran' => $this->pelajaran->nama_pelajaran
            ]
        ];
    }
}
