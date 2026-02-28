<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class NilaiSiswa extends Model
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $fillable = ['tugas', 'uts', 'uas', 'rata_rata', 'siswa_id', 'pelajaran_id', 'kelas_id'];
    protected $table = 'nilai_siswa';
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid();
            }
        });
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pelajaran(): BelongsTo
    {
        return $this->belongsTo(related: Pelajaran::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
}
