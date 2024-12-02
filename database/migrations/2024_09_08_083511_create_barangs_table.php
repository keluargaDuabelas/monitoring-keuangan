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
        Schema::create('barangs', function (Blueprint $table) {
         
            $table->uuid('id')->primary();
            $table->string('nama_barang');
            $table->decimal('harga_satuan', 15, 2); // Harga satuan barang
            $table->integer('jumlah_barang'); // Jumlah barang
            $table->string('jenis_barang'); // Jenis barang
            $table->decimal('total_harga', 15, 2)->virtualAs('harga_satuan * jumlah_barang'); // Total harga otomatis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
