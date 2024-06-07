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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id('keluarga_id');
            $table->string('no_kk');
            $table->unsignedBigInteger('kepala_keluarga')->nullable();
            $table->unsignedBigInteger('rw')->index();
            $table->unsignedBigInteger('rt')->index();

            $table->timestamps();

            $table->foreign('rw')->references('rw_id')->on('rw');
            $table->foreign('rt')->references('rt_id')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
