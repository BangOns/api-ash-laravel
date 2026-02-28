<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PelajaranResource extends JsonResource
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
            'nama_pelajaran' => $this->nama_pelajaran,
            'kelas' => [
                'id' => $this->kelas->id,
                'nama_kelas' => $this->kelas->nama_kelas
            ],
            'wali_kelas' => [
                'id' => $this->wali_kelas->id,
                'nama_wali_kelas' => $this->wali_kelas->nama_wali_kelas
            ]

        ];
    }
}
