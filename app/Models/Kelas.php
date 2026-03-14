<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Kelas extends Model
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $fillable = ['nama_kelas', 'jurusan_id', 'wali_kelas_id'];
    // protected $hidden = [
    //     'jurusan_id',
    //     'wali_kelas_id',
    // ];
    protected $table = 'kelas';
    protected $keyType = 'string';
    public $incrementing = false;
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (!$model->id) {
    //             $model->id = Str::uuid();
    //         }
    //     });
    // }
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function wali_kelas(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
    public function kehadiran(): HasMany
    {
        return $this->hasMany(Kehadiran::class);
    }
    public function nilaiSiswa(): HasMany
    {
        return $this->hasMany(NilaiSiswa::class);
    }
    public function pelajaran(): HasMany
    {
        return $this->hasMany(Pelajaran::class);
    }
}
