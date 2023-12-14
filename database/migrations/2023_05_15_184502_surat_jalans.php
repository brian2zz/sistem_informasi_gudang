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
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->BigIncrements('id_surat_jalan', true);
            $table->string('nosurat');
            $table->string('kota');
            $table->string('tujuan');
            $table->string('alamattujuan');
            $table->string('penerima');
            $table->string('pengirim');
            $table->string('mengetahui');
            $table->string('dibuatoleh');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
