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
        Schema::create('pendaftar_kriteria', function (Blueprint $table) {
            $table->id('pk_id');
            $table->unsignedBigInteger('pendaftar_id');
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->timestamps();
            
            $table->foreign('pendaftar_id')->references('pendaftar_id')->on('pendaftar_bansos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_kriteria_id')->references('sub_kriteria_id')->on('sub_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_kriteria');
    }
};
