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
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('siswa_id')->constrained(
                table: 'siswa',
                indexName: 'kehadiran_siswa_id'
            )->onUpdate('cascade');
            $table->foreignUuid('kelas_id')->constrained(
                table: 'kelas',
                indexName: 'kehadiran_kelas_id'
            )->onUpdate('cascade');
            $table->foreignUuid('pelajaran_id')->constrained(
                table: 'pelajaran',
                indexName: 'kehadiran_pelajaran_id'
            )->onUpdate('cascade');
            $table->string('status');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran');
    }
};
