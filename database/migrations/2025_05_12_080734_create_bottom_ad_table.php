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
        Schema::create('bottom_ad', function (Blueprint $table) {
            $table->id();                          // Auto-incrementing primary key 'id'
            $table->string('File_Path');           // Corresponds to varchar(255)
            $table->boolean('is_top');             // Corresponds to tinyint(1) in MySQL
            $table->timestamps();                  // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottom_ad');
    }
};