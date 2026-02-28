<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Pelajaran extends Model
{
    use HasFactory, HasUuids, HasApiTokens;


    protected $fillable = ['kelas_id', 'nama_pelajaran', 'wali_kelas_id'];
    protected $table = 'pelajaran';
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
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(related: Kelas::class);
    }

    public function wali_kelas(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class);
    }

    public function kehadiran(): HasMany
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function nilai_siswa(): HasMany
    {
        return $this->hasMany(NilaiSiswa::class);
    }
}
