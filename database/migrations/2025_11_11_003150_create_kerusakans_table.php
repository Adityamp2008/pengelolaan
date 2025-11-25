<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kerusakans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('inventaris_id')
                ->constrained('inventaris')
                ->onDelete('cascade');

            // Tidak perlu nama_barang & lokasi karena ambil dari Inventaris
            $table->text('deskripsi_kerusakan');

            $table->enum('status', ['Menunggu Petugas','Diproses','Selesai','Tertunda'])
                ->default('Menunggu Petugas'); // <-- diperbaiki

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerusakans');
    }
};
