<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopAd extends Model
{
    protected $table = 'top_ad';
    public $timestamps = false;

    protected $fillable = ['File_Path', 'is_top'];
}