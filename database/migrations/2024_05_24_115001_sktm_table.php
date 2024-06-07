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
        Schema::create('sktm', function (Blueprint $table) {
            $table->id('sktm_id');
            $table->unsignedBigInteger('user')->index();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_kk');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('status_perkawinan', ['kawin', 'belum kawin']);
            $table->string('pekerjaan');
            $table->string('keperluan');
            $table->enum('status', ['proses', 'disetujui', 'ditolak']);
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
        Schema::dropIfExists('sktm');
    }
};
