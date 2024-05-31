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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id('pemasukan_id');
            $table->integer('jumlah');
            $table->string('deskripsi');
            $table->unsignedBigInteger('user')->index();
            $table->unsignedBigInteger('rt')->index();
            $table->datetime('tanggal');
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
        Schema::dropIfExists('pemasukan');
    }
};
