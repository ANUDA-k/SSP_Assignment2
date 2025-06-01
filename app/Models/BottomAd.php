<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BottomAd extends Model
{
    protected $table = 'bottom_ad';
    public $timestamps = true;

    protected $fillable = ['File_Path', 'is_top'];
}