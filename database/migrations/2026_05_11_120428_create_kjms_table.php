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
        Schema::create('kjms', function (Blueprint $table) {
            $table->id();
            $table->string('mata_kuliah');
            $table->string('dosen_pengampu');
            $table->integer('jumlah_pertemuan');
            $table->boolean('is_online')->default(false);
            $table->boolean('is_offline')->default(true);
            $table->integer('lampiran_count')->default(0);
            $table->string('dosen_koordinator');
            $table->enum('status_realisasi', ['Terealisasi', 'Belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kjms');
    }
};
