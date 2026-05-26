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
        Schema::create('rekap_kegiatan_uhbs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->enum('jenis_kegiatan', ['Seminar', 'Workshop', 'Rapat Koordinasi', 'Pengabdian']);
            $table->date('tanggal_kegiatan');
            $table->string('tempat');
            $table->enum('status_kegiatan', ['Terencana', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_kegiatan_uhbs');
    }
};
