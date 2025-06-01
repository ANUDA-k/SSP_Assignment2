<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Newsletter;
use App\Models\BottomAd;
use App\Models\Agency;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'users' => DB::table('user_info')->get(),
            'sales' => DB::table('sale')->get(),
            'rents' => DB::table('rent')->get(),
            'agencies' => DB::table('agencies')->get(),
            'topAds' => DB::table('top_ad')->get(),
            'bottomAds' => DB::table('bottom_ad')->get(),
            'newsletters' => DB::table('newsletter')->get(),
        ]);

        
    }

    public function destroy($table, $id)
    {
        DB::table($table)->where('id', $id)->delete();
        return redirect()->route('admin.index')->with('success', 'Record deleted successfully.');
    }

    public function showAdminPage()
{
    $bottomAds = BottomAd::all(); // 
    return view('admin', compact('bottomAds'));
}

public function adminDashboard()
    {
        // Fetch all newsletter subscribers
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();
        $bottomAds = BottomAd::orderBy('created_at', 'desc')->get();
        $agencies = Agency::orderBy('created_at', 'desc')->get();
        return view('admin', compact('newsletters', 'bottomAds', 'agencies'));
        // Pass the data to the admin view
        
    }

 


public function setAsBottom($id)
{
    BottomAd::query()->update(['is_top' => false]);
    BottomAd::where('id', $id)->update(['is_top' => true]);
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
}



