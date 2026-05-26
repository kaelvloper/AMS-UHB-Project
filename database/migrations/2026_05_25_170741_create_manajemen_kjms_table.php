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
        Schema::create('manajemen_kjms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->integer('kontrak_sks')->default(12);
            $table->integer('total_sks_diambil');
            $table->integer('kelebihan_sks');
            $table->string('semester');
            $table->enum('status_review', ['Sesuai Kontrak', 'Kelebihan Jam', 'Kurang Jam']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_kjms');
    }
};
