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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->foreignId('category_id')->index()->nullable()->constrained('categories');
            $table->text('title');
            $table->text('body');
            $table->dateTime('published_at')->index()->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedSmallInteger('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
