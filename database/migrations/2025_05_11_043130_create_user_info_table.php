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
        Schema::create('user_info', function (Blueprint $table) {
            // Username as primary key
            $table->string('Username')->primary();
            
            $table->string('Name');
            $table->string('Contact');
            $table->string('Password');

            $table->timestamps(); // Optional, but useful
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};