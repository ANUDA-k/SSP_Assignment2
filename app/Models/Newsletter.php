<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter'; // 
    protected $primaryKey = 'N_id';  
    public $timestamps = true;       

    protected $fillable = ['email']; // Add 'email' to fillable fields
}