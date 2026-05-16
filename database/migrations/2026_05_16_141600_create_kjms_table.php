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
            $table->foreignId('dosen_id')->nullable()->constrained('dosens')->onDelete('set null');
            $table->string('dosen_pengampu')->nullable();
            $table->integer('jumlah_pertemuan')->default(14);
            $table->boolean('is_online')->default(false);
            $table->boolean('is_offline')->default(false);
            $table->string('nim')->nullable();
            $table->string('dosen_koordinator')->nullable();
            $table->string('status_realisasi')->default('Belum'); // Terealisasi, Belum, Berjalan
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
