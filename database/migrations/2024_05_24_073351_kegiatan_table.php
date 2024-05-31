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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('kegiatan_id');
            $table->dateTime('tanggal');
            $table->string('nama_kegiatan');
            $table->unsignedBigInteger('rt')->index();
            $table->unsignedBigInteger('user')->index();
            $table->string('status');

            $table->timestamps();

            $table->foreign('rt')->references('rt_id')->on('rt');
            $table->foreign('user')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
