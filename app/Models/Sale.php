<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale'; // Explicitly set the table name

    protected $fillable = [
        'topic',
        'rooms',
        'bathrooms',
        'price',
        'description',
        'contact',
        'email',
        'images',
        'property_type', 
    ];
}