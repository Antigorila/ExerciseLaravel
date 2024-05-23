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
        Schema::table('suspends', function (Blueprint $table) {
            $table->foreign('user_id', 'suspends_ibfk_2')->references('id')->on('users');
            $table->foreign('file_id', 'suspends_ibfk_3')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suspends', function (Blueprint $table) {
            $table->dropForeign('suspends_ibfk_2');
            $table->dropForeign('suspends_ibfk_3');
        });
    }
};
