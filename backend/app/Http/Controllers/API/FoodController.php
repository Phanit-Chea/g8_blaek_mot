<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        // Validate the request data using the Validator facade
        $validator = Validator::make($request->all(), [
            'food_name' => 'required|string',
            'upload_image' => 'required|string',
            'video_url' => 'nullable|url',
            'cooking_time' => 'required|string',
            'ingredient' => 'required|string',
            'how_to_cook' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Ensure the user is authenticated
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Create a new Food instance and save the data
        $food = new Food();
        $food->user_id = $user->id;
        $food->food_name = $request->food_name;
        $food->upload_image = $request->upload_image;
        $food->video_url = $request->video_url;
        $food->cooking_time = $request->cooking_time;
        $food->ingredient = $request->ingredient;
        $food->how_to_cook = $request->how_to_cook;
        $food->save();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Created food successfully'], 201);
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
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function destroy(Request $request, $id)
    {
        $food = Food::find($id);

        // Check if food exists
        if (!$food) {
            return response()->json(['message' => 'Food not found'], 404);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the authenticated user is the owner of the food item
        if ($food->user_id !== $user->id) {
            return response()->json(['message' => 'You cannot delete this food'], 403);
        }

        // Delete the food item
        $food->delete();

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Food deleted successfully'], 200);
    }
}
