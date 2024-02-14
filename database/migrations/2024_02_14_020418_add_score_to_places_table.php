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
        Schema::table('places', function (Blueprint $table) {
            $table->decimal('score', 4, 2)->default(0)->after('name')->comment('The score of the place');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            // Eliminar el campo 'score' si es necesario
            $table->dropColumn('score');
        });
    }
};