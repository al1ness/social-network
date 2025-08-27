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

            //$table->foreignId('user_id')
               // ->constrained(table: 'users')
                //->onDelete('cascade');

            $table->text('title');
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->text('body')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedSmallInteger('status')->default(0);
            $table->timestamps();

            $table->index('published_at');
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
