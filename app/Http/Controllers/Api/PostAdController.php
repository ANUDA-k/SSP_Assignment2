<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Rent;

class PostAdController extends Controller
{
    public function store(Request $request)
    {
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

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $path);
            }
        }

        $data = $request->only([
            'topic', 'rooms', 'bathrooms', 'price',
            'description', 'contact', 'email', 'property_type'
        ]);
        $data['images'] = implode(',', $imagePaths);

        if ($request->ad_type === 'sale') {
            $ad = Sale::create($data);
        } else {
            $ad = Rent::create($data);
        }

        return response()->json([
            'status' => true,
            'message' => 'Ad posted successfully!',
            'data' => $ad
        ]);
    }
}
