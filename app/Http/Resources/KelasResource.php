<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
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
            'nama_kelas' => $this->nama_kelas,
            'jurusan' => [
                'id' => $this->jurusan->id,
                'nama_jurusan' => $this->jurusan->nama_jurusan
            ],
            'wali_kelas' => [
                'id' => $this->waliKelas->id,
                'nama_wali_kelas' => $this->waliKelas->nama_wali_kelas
            ]
        ];
    }
}
