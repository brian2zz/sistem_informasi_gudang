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
        Schema::create('record_service_customers', function (Blueprint $table) {
            $table->id();
            $table->string('id_pt');
            $table->string('contact_person')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('running_hours')->nullable();
            $table->string('type')->nullable();
            $table->text('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_service_customers');
    }
};
