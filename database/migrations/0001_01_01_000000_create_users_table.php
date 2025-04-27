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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username')->unique();
                $table->string('pass');
                $table->json('gamedata');
                $table->json('achievements');
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('leaderboards')) {
            Schema::create('leaderboards', function (Blueprint $table) {
                $table->id();
                $table->string('username');
                $table->string('score');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
