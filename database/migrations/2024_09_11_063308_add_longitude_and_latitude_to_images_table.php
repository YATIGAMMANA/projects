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
        Schema::table('images', function (Blueprint $table) {
            $table->string('longitude')->nullable(); // Add longitude column
            $table->string('latitude')->nullable();  // Add latitude column

            // $table->decimal('longitude',10,7)->nullable();
            // $table->decimal('latitude',10,7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['longitude', 'latitude']); // Remove longitude and latitude columns
        });
    }
};
