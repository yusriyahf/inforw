<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index()->after('kartu_keluarga_id')->nullable();
            $table->unsignedBigInteger('rt_id')->index()->after('kartu_keluarga_id')->nullable();
            $table->foreign('rt_id')->references('rt_id')->on('rt');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('kartu_keluarga', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
