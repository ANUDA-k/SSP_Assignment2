<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\TopAd;

class AboutUsController extends Controller
{
    public function show()
    {
        $latestTopAd = TopAd::where('is_top', true)
            ->latest('id') // Or 'created_at' if you prefer
            ->first();
    
        return view('aboutus', compact('latestTopAd'));
    }
    public function newsletters()
{
    $subscribers = Newsletter::all(); // Never null, always a collection (can be empty)
    return view('admin.newsletters', compact('subscribers'));
}
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            Newsletter::create([
                'email' => $request->email
            ]);

            return redirect()->route('about')->with('success', 'Subscription successful!');
        } catch (\Exception $e) {
            return redirect()->route('about')->with('error', 'Subscription failed: ' . $e->getMessage());
        }
    }


}