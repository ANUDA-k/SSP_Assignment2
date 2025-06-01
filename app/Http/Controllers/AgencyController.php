<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreAgencyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AgencyController extends Controller
// {
//     public function store(StoreAgencyRequest $request)
// {
//     // File uploads (move to public/img)
//     $doc = $request->file('Document');
//     $img = $request->file('Image');

//     $docName = time() . '_doc_' . $doc->getClientOriginalName();
//     $imgName = time() . '_img_' . $img->getClientOriginalName();

//     $doc->move(public_path('img'), $docName);
//     $img->move(public_path('img'), $imgName);

//     // Save agency data
//     Agency::create([
//         'Agency_Name' => $request->Agency_Name,
//         'Description' => $request->Description,
//         'Documents' => 'img/' . $docName,
//         'Image' => 'img/' . $imgName,
//     ]);

//     return redirect()->back()->with('success', 'Agency saved successfully.');
// }

//     public function index()
//     {
//         $agencies = Agency::all();
//         return view('admin.agency', compact('agencies'));
//     }
// }
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'Agency_Name' => 'required|string|max:255',
    //         'Description' => 'required|string|max:255',
    //         'Documents' => 'nullable|file|mimes:pdf,doc,docx',
    //         'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $docName = null;
    //     $imgName = null;

    //     if ($request->hasFile('Documents')) {
    //         $docName = Str::random(10) . '.' . $request->Documents->getClientOriginalExtension();
    //         $request->Documents->move(public_path('img'), $docName);
    //     }

    //     if ($request->hasFile('Image')) {
    //         $imgName = Str::random(10) . '.' . $request->Image->getClientOriginalExtension();
    //         $request->Image->move(public_path('img'), $imgName);
    //     }

    //     Agency::create([
    //         'Agency_Name' => $request->Agency_Name,
    //         'Description' => $request->Description,
    //         'Documents' => $docName,
    //         'Image' => $imgName,
    //     ]);

    //     return redirect()->back()->with('success', 'Agency added successfully!');
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'Description' => 'required|string|max:1000',
    //     ]);
    
    //     $agency = Agency::findOrFail($id);
    //     $agency->Description = $request->Description;
    //     $agency->save();
    
    //     return redirect()->back()->with('success', 'Agency description updated successfully.');
    // }
    public function store(Request $request)
{
    $request->validate([
        'Agency_Name' => 'required|string|max:255',
        'Description' => 'required|string|max:255',
        'Documents' => 'required|file|mimes:pdf,doc,docx',
        'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $docName = null;
    $imgName = null;

    if ($request->hasFile('Documents')) {
        $docName = Str::random(10) . '.' . $request->file('Documents')->getClientOriginalExtension();
        $request->file('Documents')->move(public_path('img'), $docName);
    }

    if ($request->hasFile('Image')) {
        $imgName = Str::random(10) . '.' . $request->file('Image')->getClientOriginalExtension();
        $request->file('Image')->move(public_path('img'), $imgName);
    }

    Agency::create([
        'Agency_Name' => $request->Agency_Name,
        'Description' => $request->Description,
        'Documents' => $docName,
        'Image' => $imgName,
    ]);

    return redirect()->back()->with('success', 'Agency added successfully!');
}


public function update(Request $request, $id)
{
    $request->validate([
        'Description' => 'required|string|max:255',
    ]);

    $agency = Agency::findOrFail($id);
    $agency->Description = $request->Description;
    $agency->save();

    return response()->json([
        'success' => true,
        'message' => 'Description updated successfully!',
        'updatedDescription' => $agency->Description,
    ]);
}

public function addToUpcoming($id)
{
    $path = 'upcoming_agencies.json';

    // Get current list or initialize
    $ids = [];
    if (Storage::exists($path)) {
        $ids = json_decode(Storage::get($path), true);
    }

    // Add if not already present
    if (!in_array($id, $ids)) {
        $ids[] = $id;
        Storage::put($path, json_encode($ids));
    }

    return redirect()->back()->with('success', 'Agency added to Upcoming section!');
}
}
