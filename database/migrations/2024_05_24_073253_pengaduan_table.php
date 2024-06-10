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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('pengaduan_id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('gambar')->nullable();
            $table->enum('jenis', ['saran', 'pengaduan']);
            $table->unsignedBigInteger('user')->index();
            $table->unsignedBigInteger('rw')->index();
            $table->unsignedBigInteger('rt')->index();
            $table->timestamps();
            $table->enum('status', ['proses', 'disetujui','ditolak']);

            $table->foreign('user')->references('user_id')->on('users');
            $table->foreign('rw')->references('rw_id')->on('rw');
            $table->foreign('rt')->references('rt_id')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
