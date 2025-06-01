<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ForSaleController extends Controller
{
    /**
     * Display the list of properties for sale.
     */
    public function index()
    {
        // Fetch all properties from the "sale" table
        $properties = Sale::all();

        // Path to top ad image — update this logic if you store ads in DB
        $top_ad_file_path = 'storage/topad/example.jpg'; // Replace with dynamic logic if needed

        // Pass data to the Blade view
        return view('forsale', compact('properties', 'top_ad_file_path'));
    }
}

