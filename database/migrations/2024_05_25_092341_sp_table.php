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
        Schema::create('sp', function (Blueprint $table) {
            $table->id('sp_id');
            $table->unsignedBigInteger('user')->index();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('pekerjaan');
            $table->string('nik');
            $table->enum('status_perkawinan', ['kawin', 'belum kawin']);
            $table->string('keperluan');
            $table->string('status')->default('proses');
            $table->unsignedBigInteger('rt')->index();

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
        Schema::dropIfExists('sp');
    }
};
