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
        Schema::table('soul_links', function (Blueprint $table) {
            $table->foreign('current_user_id', 'soul_links_ibfk_2')->references('id')->on('users');
            $table->foreign('friend_user_id', 'soul_links_ibfk_3')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soul_links', function (Blueprint $table) {
            $table->dropForeign('soul_links_ibfk_2');
            $table->dropForeign('soul_links_ibfk_3');
        });
    }
};
