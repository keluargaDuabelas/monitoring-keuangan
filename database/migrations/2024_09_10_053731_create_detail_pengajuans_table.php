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
        Schema::create('detail_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('rekening_id');
            $table->uuid('pengajuan_id');
            $table->string('uraian');
            $table->string('volume');
            $table->string('satuan');
            $table->string('harga');
            $table->string('ppn');
            $table->string('jumlah');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengajuans');
    }
};
