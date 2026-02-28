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
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_pelajaran');
            $table->foreignUuid('kelas_id')->constrained(
                table: 'kelas',
                indexName: 'pelajaran_kelas_id'
            )->onUpdate('cascade');
            $table->foreignUuid('wali_kelas_id')->constrained(
                table: 'wali_kelas',
                indexName: 'pelajaran_wali_kelas_id'
            )->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajaran');
    }
};
