<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\BottomAd;

// class BottomAdController extends Controller
// {
//     public function store(Request $request)
//     {
//         $request->validate([
//             'bottom_ad_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $file = $request->file('bottom_ad_image');
//         $filename = time() . '_' . $file->getClientOriginalName();
//         $file->move(public_path('img'), $filename);

//         BottomAd::create([
//             'File_Path' => 'img/' . $filename,
//             'is_top' => false,
//         ]);

//         return back()->with('success', 'Bottom ad image uploaded successfully!');
//     }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BottomAd;
use Illuminate\Support\Facades\File;

class BottomAdController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bottom_ad_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bottom_ad_image')) {
            $image = $request->file('bottom_ad_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            // Set all other ads to is_top = false
            BottomAd::where('is_top', true)->update(['is_top' => false]);

            BottomAd::create([
                'File_Path' => 'img/' . $imageName,
                'is_top' => true,
            ]);

            // return redirect()->back()->with('success', 'Bottom Ad image uploaded successfully.');
            return redirect()->back()->with('bottomad_success', 'Bottom Ad image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No image uploaded.');
    }

    public function index()
{
    $bottomAds = BottomAd::all();
    return view('admin.bottom_ads', compact('bottomAds'));
}

public function setAsBottom($id)
{
    BottomAd::query()->update(['is_top' => false]); // Unset all
    BottomAd::where('id', $id)->update(['is_top' => true]); // Set selected
    return back()->with('success', 'Bottom Ad updated.');
}

public function delete($id)
{
    $ad = BottomAd::findOrFail($id);

    if (File::exists(public_path($ad->File_Path))) {
        File::delete(public_path($ad->File_Path));
    }

    $ad->delete();

    return back()->with('success', 'Bottom Ad deleted.');
}

public function destroy($id)
{
    $ad = BottomAd::findOrFail($id);
    if (file_exists(public_path($ad->File_Path))) {
        unlink(public_path($ad->File_Path));
    }
    $ad->delete();
    return redirect()->back()->with('success', 'Bottom Ad deleted successfully.');
}

}
