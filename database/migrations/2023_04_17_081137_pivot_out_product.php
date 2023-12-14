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
        Schema::create('pivot_out_product', function (Blueprint $table) {
            $table->BigIncrements('id', true);
            $table->string('id_produk_keluar');
            $table->string('id_produk');
            $table->integer('jumlah_keluar');
            $table->integer('sisa_stok_keluar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_out_product');
    }
};
