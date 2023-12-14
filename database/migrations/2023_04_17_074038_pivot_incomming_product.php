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
        Schema::create('pivot_incoming_product', function (Blueprint $table) {
            $table->BigIncrements('id', true);
            $table->string('id_produk_masuk');
            $table->string('id_produk');
            $table->integer('jumlah_masuk');
            $table->integer('sisa_stok_masuk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_incoming_product');
    }
};
