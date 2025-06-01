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
        Schema::create('rent', function (Blueprint $table) {
            $table->id();
            $table->string('topic');              // Column for 'Topic'
            $table->string('rooms');              // Column for 'Rooms'
            $table->string('bathrooms');          // Column for 'Bathrooms'
            $table->string('price');              // Column for 'Price'
            $table->string('description');        // Column for 'Description'
            $table->string('contact');            // Column for 'Contact'
            $table->string('email');              // Column for 'Email'
            $table->string('property_type', 4);   // Column for 'Property_Type', with a length of 4
            $table->string('images');             // Column for 'Images'
            $table->timestamps();                // Laravel's default created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
