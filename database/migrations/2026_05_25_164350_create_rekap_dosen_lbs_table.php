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
        Schema::create('rekap_dosen_lbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->integer('total_sks');
            $table->integer('tarif_per_sks')->default(50000);
            $table->integer('total_honor');
            $table->string('bulan');
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Proses', 'Lunas'])->default('Belum Dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_dosen_lbs');
    }
};
