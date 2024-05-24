<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->id('user_id');
    //         $table->string('nik');
    //         $table->string('nama');
    //         $table->string('password');
    //         $table->string('pekerjaan')->nullable();
    //         $table->string('notelp')->nullable();
    //         $table->enum('status_perkawinan', ['kawin', 'belum kawin'])->nullable();
    //         $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
    //         $table->string('tempat_lahir')->nullable();
    //         $table->date('tanggal_lahir')->nullable();
    //         $table->unsignedBigInteger('rt_id')->index();
    //         $table->unsignedBigInteger('role_id')->index();
    //         $table->unsignedBigInteger('kartu_keluarga_id')->index();

    //         $table->timestamps();

    //         $table->foreign('rt_id')->references('rt_id')->on('rt');
    //         $table->foreign('role_id')->references('role_id')->on('roles');
    //         $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
