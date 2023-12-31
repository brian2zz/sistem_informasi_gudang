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
        Schema::create('sistem_customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('id_pt');
            $table->string('attn');
            $table->string('tanggal');
            $table->string('type');
            $table->string('nota');
            $table->longtext('service');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistem_customer_details');
    }
};
