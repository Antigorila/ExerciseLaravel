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
        Schema::create('soul_links_requests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('to_user_id')->index('to_user_id');
            $table->integer('from_user_id')->index('from_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soul_links_requests');
    }
};
