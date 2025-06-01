<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopAd;

class HomeController extends Controller
{
    public function index()
    {
        $latestTopAd = TopAd::where('is_top', true)
            ->latest('id') // Or created_at if timestamps enabled
            ->first();
    
        return view('index', compact('latestTopAd'));
    }
}
