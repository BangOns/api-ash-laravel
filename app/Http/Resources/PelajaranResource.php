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
            'kelas' =>  $this->kelas ? [
                'id' => $this->kelas->id,
                'nama_kelas' => $this->kelas->nama_kelas
            ] : null,
            'wali_kelas' =>  $this->waliKelas ? [
                'id' => $this->waliKelas->id,
                'nama_wali_kelas' => $this->waliKelas->nama_wali_kelas
            ] : null

        ];
    }
}
