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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->unsignedBigInteger('peminjam')->index();
            $table->unsignedBigInteger('aset')->index();
            $table->unsignedBigInteger('rt')->index();

            $table->timestamps();

            $table->foreign('peminjam')->references('user_id')->on('users');
            $table->foreign('aset')->references('aset_id')->on('aset');
            $table->foreign('rt')->references('rt_id')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
