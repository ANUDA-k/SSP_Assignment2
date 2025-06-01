<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // Assuming your model is named Sale

class PropertyController extends Controller
{
    public function show($id)
    {
        $property = Sale::findOrFail($id);
        return view('saleProfile', compact('property'));
    }
}