<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_products', function (Blueprint $table) {
            $table->BigIncrements('id_produk_masuk', true);
            $table->string('tanggal_masuk');
            $table->string('id_supplier');
            $table->string('id_pembeli');
            $table->string('keterangan');
            $table->integer('submit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_products');
    }
};
