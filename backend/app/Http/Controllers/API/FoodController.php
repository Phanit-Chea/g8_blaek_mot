<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Ensure the request comes from an authenticated user
         $user = Auth::user()->id;
         if (!$user) {
             return response()->json(['error' => 'Unauthorized'], 401);
         }
 
         // Validate the request data
         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'cooking_time' => 'required|string|max:255',
             'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'video_url' => 'nullable|url',
             'nutrition' => 'nullable|array',
             'ingredients' => 'nullable|array',
         ]);
 
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
 
         // Store the image file
         $imagePath = $request->file('image_path')->store('images', 'public');
 
         // Create the food record
         $food = Food::create([
             'user_id' => $user, // Use the authenticated user's ID
             'name' => $request->name,
             'cooking_time' => $request->cooking_time,
             'image_path' => $imagePath,
             'video_url' => $request->video_url,
             'nutrition' => $request->nutrition,
             'ingredients' => $request->ingredients,
         ]);
 
         return response()->json($food, 201);

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
