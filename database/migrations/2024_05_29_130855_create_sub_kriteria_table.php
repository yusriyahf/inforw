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
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id('sub_kriteria_id');
            $table->unsignedBigInteger('kriteria_id')->index();
            $table->string('nama_sub_kriteria')->nullable();
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriteria');
    }
};
