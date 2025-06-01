<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
//new part
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SaleApiController extends Controller
{
    public function index()
    {
        $sales = Sale::all();

        return response()->json([
            'status' => true,
            'message' => 'Sale listings fetched successfully',
            'data' => $sales
        ]);
    }

    //new part
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'rooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'price' => 'required|string',
            'description' => 'required|string',
            'contact' => 'required|string',
            'email' => 'required|email',
            'property_type' => 'required|string|in:House,Apartment,Land',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imagePaths[] = str_replace('public/', 'storage/', $path);
            }
        }

        $sale = Sale::create([
            'topic' => $request->topic,
            'rooms' => $request->rooms,
            'bathrooms' => $request->bathrooms,
            'price' => $request->price,
            'description' => $request->description,
            'contact' => $request->contact,
            'email' => $request->email,
            'property_type' => $request->property_type,
            'images' => implode(',', $imagePaths),
        ]);

        return response()->json([
            'message' => 'Ad posted successfully!',
            'ad' => $sale
        ], 201);
}
}