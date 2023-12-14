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
        Schema::create('surat_jalan_details', function (Blueprint $table) {
            $table->BigIncrements('id_surat_jalan_detail', true);
            $table->string('id_surat_jalan');
            $table->string('namabarang');
            $table->string('jumlah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalan_details');
    }
};
