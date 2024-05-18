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
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('kk');
            $table->string('alamat');
            $table->string('rt');
            $table->enum('status_pernikahan', ['menikah', 'belum menikah']);
            $table->enum('status_keluarga', ['anak', 'ayah', 'ibu']);
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['warga', 'rt', 'rw', 'admin']);
            $table->string('password');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->rememberToken();
            $table->timestamps();
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
