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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('kriteria_id');
            $table->unsignedBigInteger('bansos_id')->index();
            $table->string('nama_kriteria');
            $table->enum('jenis_kriteria',['benefit','cost']);
            $table->double('bobot')->nullable();
            $table->timestamps();

            $table->foreign('bansos_id')->references('bansos_id')->on('bansos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria');
    }
};
