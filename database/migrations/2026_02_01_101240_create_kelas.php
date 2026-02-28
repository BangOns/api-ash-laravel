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
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kelas');
            $table->foreignUuid('jurusan_id')->constrained(
                table: 'jurusan',
                indexName: 'kelas_jurusan_id'
            )->onUpdate('cascade');
            $table->foreignUuid('wali_kelas_id')->constrained(
                table: 'wali_kelas',
                indexName: 'kelas_wali_kelas_id'
            )->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
