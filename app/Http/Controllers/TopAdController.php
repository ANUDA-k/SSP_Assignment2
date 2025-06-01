<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\TopAd;
// use Illuminate\Support\Facades\Storage;

// class TopAdController extends Controller
// {
//     public function store(Request $request)
//     {
//         $request->validate([
//             'top_ad_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);
    
//         $image = $request->file('top_ad_image');
//         $imageName = time() . '.' . $image->getClientOriginalExtension();
//         $image->move(public_path('uploads/topads'), $imageName);
    
//         TopAd::create([
//             'File_Path' => 'uploads/topads/' . $imageName,
//             'is_top' => true
//         ]);
    
//         return back()->with('success', 'Top Ad uploaded and saved to the database.');
//     }
//    }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopAd;

class TopAdController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'top_ad_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('top_ad_image')) {
        $image = $request->file('top_ad_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName); // Save to public/img

         // Set all other ads to is_top = false
         TopAd::where('is_top', true)->update(['is_top' => false]);
        // Save relative path to DB
        \App\Models\TopAd::create([
            'File_Path' => 'img/' . $imageName, // Path relative to public/
            'is_top' => true,
        ]);

        // return redirect()->back()->with('success', 'Top Ad image uploaded successfully.');
        return redirect()->back()->with('topad_success', 'Top Ad image uploaded successfully.');
    }

    return redirect()->back()->with('error', 'No image uploaded.');
}
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $file = $request->file('image');
    //     $filename = time() . '_' . $file->getClientOriginalName();
    //     $filePath = $file->storeAs('top_ads', $filename, 'public/img');

    //     TopAd::create([
    //         'File_Path' => $filePath,
    //         'is_top' => true,
    //     ]);

    //     return redirect()->route('admin.dashboard')->with('success', 'Top ad uploaded successfully!');
    // }
}