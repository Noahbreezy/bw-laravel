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
            $table->string('title'); // Title of the post
            $table->text('content'); // Post content
            $table->string('cover')->nullable(); // Optional cover image
            $table->date('publishDate')->nullable(); // Optional publish date
            $table->foreignId('user_id') // Foreign key to users table
                  ->constrained()
                  ->onDelete('cascade'); // Cascade delete on user deletion
            $table->timestamps(); // Created_at and updated_at columns
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
