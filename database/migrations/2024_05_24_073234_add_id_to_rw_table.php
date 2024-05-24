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
        Schema::table('rw', function (Blueprint $table) {
            $table->unsignedBigInteger('ketua')->nullable()->index();
            $table->unsignedBigInteger('sekretaris')->nullable()->index();
            $table->unsignedBigInteger('bendahara')->nullable()->index();
            $table->foreign('ketua')->references('user_id')->on('users');
            $table->foreign('sekretaris')->references('user_id')->on('users');
            $table->foreign('bendahara')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rw', function (Blueprint $table) {
            $table->dropForeign(['ketua']);
            $table->dropForeign(['sekretaris']);
            $table->dropForeign(['bendahara']);
            $table->dropColumn(['ketua', 'sekretaris', 'bendahara']);
        });
    }
};
