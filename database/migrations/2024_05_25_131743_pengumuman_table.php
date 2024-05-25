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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('pengumuman_id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->date('tanggal');
            $table->unsignedBigInteger('user')->index();
            $table->unsignedBigInteger('rt')->index();

            $table->timestamps();
            $table->foreign('user')->references('user_id')->on('users');
            $table->foreign('rt')->references('rt_id')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
