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
        Schema::create('nilai_siswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('rata_rata');
            $table->foreignUuid('siswa_id')->constrained(
                table: 'siswa',
                indexName: 'nilai_siswa_siswa_id'
            )->onUpdate('cascade');
            $table->foreignUuid('pelajaran_id')->constrained(
                table: 'pelajaran',
                indexName: 'nilai_siswa_pelajaran_id'
            )->onUpdate('cascade');
            $table->foreignUuid('kelas_id')->constrained(
                table: 'kelas',
                indexName: 'nilai_siswa_kelas_id'
            )->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_siswa');
    }
};
