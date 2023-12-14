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
        Schema::create('out_products', function (Blueprint $table) {
            $table->BigIncrements('id_produk_keluar', true);
            $table->string('tanggal_keluar');
            $table->string('id_pembeli');
            $table->string('id_supplier');
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
        Schema::dropIfExists('out_products');
    }
};
