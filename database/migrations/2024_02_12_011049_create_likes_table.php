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
        Schema::create('likes', function (Blueprint $table) {
            $table->id()->comment('Unique identifier for the like');
            $table->unsignedBigInteger('user_id')->comment('Foreign key referencing the users table');
            $table->unsignedBigInteger('place_id')->comment('Foreign key referencing the places table');
            $table->timestamps();
        }, 'Table that store like made by users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
