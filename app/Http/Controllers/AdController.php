<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sale;
use App\Models\Rent;

class AdController extends Controller
{
    public function create()
    {
        return view('post-ad');
    }

    public function store(Request $request)
    {
        //  Validate input
        $validated = $request->validate([
            'property_type' => 'required|string|in:House,Apartment,Land',
            'ad_type' => 'required|in:sale,rent',
            'topic' => 'required|string',
            'rooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'price' => 'required|string',
            'description' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|email',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        //  Handle file uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $path);
            }
        }

        //  Prepare data for insertion
        $data = $request->only([
            'topic', 'rooms', 'bathrooms', 'price',
            'description', 'contact', 'email', 'property_type'
        ]);
        $data['images'] = implode(',', $imagePaths);

        //  Save into the appropriate table
        if ($request->ad_type === 'sale') {
            Sale::create($data);
        } else {
            Rent::create($data);
        }

        return redirect()->route('ads.create')->with('success', 'Ad posted successfully!');
    }
}