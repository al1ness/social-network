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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('user_id')->index()->constrained(table: 'users');
            $table->string('avatar_url')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->date('birthdate')->nullable();
            $table->string('location')->index()->nullable();
            $table->json('social_links')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
