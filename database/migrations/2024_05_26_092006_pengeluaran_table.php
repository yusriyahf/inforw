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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id('pengeluaran_id');
            $table->integer('jumlah');
            $table->string('deskripsi');
            $table->unsignedBigInteger('rt')->index();

            $table->timestamps();
            $table->foreign('rt')->references('rt_id')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
