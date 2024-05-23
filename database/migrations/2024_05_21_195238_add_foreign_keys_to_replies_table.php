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
        Schema::table('replies', function (Blueprint $table) {
            $table->foreign('user_id', 'replies_ibfk_4')->references('id')->on('users');
            $table->foreign('comment_id', 'replies_ibfk_5')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->dropForeign('replies_ibfk_4');
            $table->dropForeign('replies_ibfk_5');
        });
    }
};
