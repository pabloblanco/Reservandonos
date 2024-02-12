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
            $table->id()->comment('Unique identifier for the user');
            $table->string('name')->comment('The name of the user');
            $table->string('email')->unique()->comment('The unique email address of the user');
            $table->timestamp('email_verified_at')->nullable()->comment('The timestamp when the user\'s email was verified');
            $table->string('password')->comment('The hashed password of the user');
            $table->rememberToken();
            $table->timestamps();
        }, 'Table that store information about the users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
