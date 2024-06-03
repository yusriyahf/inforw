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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('password');
            $table->string('pekerjaan')->nullable();
            $table->string('notelp')->nullable();
            $table->enum('status_perkawinan', ['kawin', 'belum kawin'])->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedBigInteger('keluarga')->index()->nullable();
            $table->unsignedBigInteger('role')->index();
            $table->timestamps();

            $table->foreign('keluarga')->references('keluarga_id')->on('keluarga');
            $table->foreign('role')->references('role_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
