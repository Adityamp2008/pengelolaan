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
       Schema::create('inventaris', function (Blueprint $table) {
    $table->id();
    $table->string('nama_barang');
    
    // Relasi ke tabel kategori & lokasi
    $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
    $table->foreignId('lokasi_id')->constrained('lokasi')->onDelete('cascade');
    
    $table->string('kondisi')->default('Baik');
    $table->string('status')->default('Tersedia'); // Tersedia, Rusak, Dipinjam
    $table->date('tanggal_perolehan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
