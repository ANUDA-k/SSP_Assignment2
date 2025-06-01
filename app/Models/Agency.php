<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Agencies extends Model
// {
    
//     protected $table = 'agencies';

//     protected $fillable = [
//         'Agency_Name',
//         'Description',
//         'Documents',
//         'Image',
//     ];
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Agency extends Model

{
         protected $table = 'agencies';
    protected $fillable = ['Agency_Name', 'Description', 'Documents', 'Image'];

   
public function getImageUrlAttribute()
    {
        return asset('img/' . $this->Image);
    }

    // Accessor for document link
    public function getDocumentUrlAttribute()
    {
        return asset('img/' . $this->Documents);
    }

    // Mutator for Agency_Name
    public function setAgencyNameAttribute($value)
    {
        $this->attributes['Agency_Name'] = ucwords(strtolower($value));
    }

    // Scope: Only agencies with a document uploaded
    public function scopeHasDocument($query)
    {
        return $query->whereNotNull('Documents');
    }
}