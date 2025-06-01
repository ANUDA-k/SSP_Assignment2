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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();                          // id (primary key)
            $table->string('Agency_Name');         // varchar(255)
            $table->string('Description');         // varchar(255)
            $table->string('Documents');           // varchar(255)
            $table->string('Image');               // varchar(255)
            $table->timestamps();                  // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};