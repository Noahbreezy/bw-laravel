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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 15);
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('bio', 100)->default('')->nullable(false);
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};