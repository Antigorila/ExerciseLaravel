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
        Schema::create('soul_links', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('current_user_id')->index('current_user_id');
            $table->integer('friend_user_id')->index('friend_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soul_links');
    }
};
