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
        Schema::create('newsletter', function (Blueprint $table) {
            $table->id('N_id');              // Column for 'N_id' (primary key)
            $table->string('email');          // Column for 'Email'
            $table->timestamps();            // Laravel's default created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter');
    }
};