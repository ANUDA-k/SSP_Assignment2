<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rent';

    protected $fillable = [
        'topic',
        'rooms',
        'bathrooms',
        'price',
        'description',
        'contact',
        'email',
        'property_type',
        'images',
    ];
}