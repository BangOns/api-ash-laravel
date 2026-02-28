<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class WaliKelas extends Model
{
    use HasFactory, HasUuids, HasApiTokens;
    protected $fillable = ['nama_wali_kelas', 'telp', 'email', 'jkl'];
    protected $table = 'wali_kelas';
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
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
    public function pelajaran(): HasMany
    {
        return $this->hasMany(Pelajaran::class);
    }
}
