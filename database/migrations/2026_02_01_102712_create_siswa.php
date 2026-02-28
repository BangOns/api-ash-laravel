<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_siswa');
            $table->string('jkl');
            $table->foreignUuid('kelas_id')->constrained(
                table: 'kelas',
                indexName: 'siswa_kelas_id'
            )->onUpdate('cascade');

            $table->foreignUuid('jurusan_id')->constrained(
                table: 'jurusan',
                indexName: 'siswa_jurusan_id'
            )->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
