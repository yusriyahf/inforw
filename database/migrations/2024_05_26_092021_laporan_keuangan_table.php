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
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id('laporan_keuangan_id');
            $table->integer('saldo');
            $table->unsignedBigInteger('pemasukan')->index();
            $table->unsignedBigInteger('pengeluaran')->index();

            $table->timestamps();
            $table->foreign('pemasukan')->references('pemasukan_id')->on('pemasukan');
            $table->foreign('pengeluaran')->references('pengeluaran_id')->on('pengeluaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
