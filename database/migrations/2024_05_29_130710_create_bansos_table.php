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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id('bansos_id');
            $table->string('nama_bansos');
            $table->bigInteger('total_bantuan');
            $table->enum('jenis_bansos',['tunai','non-tunai']);
            $table->integer('jumlah_penerima');
            $table->enum('tipe_penerima',['individu','keluarga']);
            $table->date('tgl_akhir_daftar');
            $table->date('tgl_penyaluran');
            $table->enum('status',['proses','selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
