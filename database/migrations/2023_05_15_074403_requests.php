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
        Schema::create('requests', function (Blueprint $table) {
            $table->BigIncrements('id', true);
            $table->string('permintaan_barang')->nullable();
            $table->string('jumlah_permintaan')->nullable();
            $table->string('jumlah_relasi')->nullable();
            $table->string('tanggal_permintaan')->nullable();
            $table->string('tanggal_relasi')->nullable();
            $table->string('toko')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('harga_total')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('tempat_supplier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
