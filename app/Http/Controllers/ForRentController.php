<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\TopAd;

class ForRentController extends Controller
{
    // Shows all rental listings
    public function index()
    {
        $rents = Rent::all();
        $topAd = TopAd::latest()->first();
        return view('forrent', compact('rents', 'topAd'));
    }

    // Shows a specific rental property profile
    public function show($id)
    {
        $property = Rent::findOrFail($id);
        return view('forRentProfile', compact('property'));
    }
}