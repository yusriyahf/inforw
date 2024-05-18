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
        Schema::create('anggota_organisasi', function (Blueprint $table) {
            $table->id('anggota_organisasi_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('organisasi_id')->index();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_organisasi');
    }
};
