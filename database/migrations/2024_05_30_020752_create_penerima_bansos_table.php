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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id('penerima_id');
            $table->unsignedBigInteger('pendaftar_id');
            $table->timestamps();

            $table->foreign('pendaftar_id')->references('pendaftar_id')->on('pendaftar_bansos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
