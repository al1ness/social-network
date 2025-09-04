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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->index()->constrained(table: 'profiles')->onDelete('cascade');
            $table->foreignId('post_id')->index()->constrained(table: 'posts')->onDelete('cascade');
            $table->foreignId('parent_id')->index()->nullable()->constrained(table: 'comments')->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
