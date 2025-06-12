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
        Schema::table('emergencies', function (Blueprint $table) {
            // Add the missing columns
            $table->decimal('latitude', 10, 7)->nullable();  // Add latitude column
            $table->decimal('longitude', 10, 7)->nullable(); // Add longitude column
            $table->text('message')->nullable(); // Add message column
            $table->enum('status', ['active', 'resolved'])->default('active'); // Add status enum column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emergencies', function (Blueprint $table) {
            // Drop the columns if we need to roll back
            $table->dropColumn(['latitude', 'longitude', 'message', 'status']);
        });
    }
};
