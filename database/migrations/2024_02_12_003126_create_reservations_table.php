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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->comment('Unique identifier for the reservation');
            $table->unsignedBigInteger('user_id')->comment('Foreign key referencing the users table');
            $table->unsignedBigInteger('place_id')->comment('Foreign key referencing the places table');
            $table->dateTime('reservation_time')->comment('Date and time of the reservation');
            $table->boolean('status')->default(true)->comment('Status of the reservation (e.g., true -> active or false -> inactive)');
            $table->timestamps();
        }, 'Table that store reservations made by users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
