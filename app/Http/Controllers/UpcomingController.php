<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Models\Agencies;
use App\Models\TopAd;
use Illuminate\Support\Facades\Storage;

class UpcomingController extends Controller
{
    public function index()
{
    $path = 'upcoming_agencies.json';
    $ids = [];

    if (Storage::exists($path)) {
        $ids = json_decode(Storage::get($path), true);
    }

    // Load agencies using Eloquent
    $agencies = Agency::whereIn('id', $ids)->get();

    $latestTopAd = TopAd::where('is_top', true)
        ->latest('id')
        ->first();

    return view('upcoming', compact('agencies', 'latestTopAd'));
}

public function showForUpcoming()
{
    $latestTopAd = TopAd::latest()->first(); // or where('is_top', true)->first();
    return view('forsale', compact('latestTopAd'));
}

    
}