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
        Schema::create('pendaftar_bansos', function (Blueprint $table) {
            $table->id('pendaftar_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bansos_id');
            $table->double('hasil_akhir')->nullable();
            $table->integer('rank')->nullable();
            $table->enum('status',['diproses','disetujui','ditolak'])->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bansos_id')->references('bansos_id')->on('bansos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_bansos');
    }
};
