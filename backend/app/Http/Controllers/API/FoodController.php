<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowFoodResource;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FoodRequest;
use App\Http\Resources\FoodResource;
use Exception;

=======
use Illuminate\Support\Facades\Auth;
>>>>>>> show_food

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = Food::all();
        $food = FoodResource::collection($food);
        return response(['success' => true, 'data' => $food], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    // FoodController.php
    public function store(FoodRequest $request)
    {
        // Ensure the request comes from an authenticated user
        $userID = Auth::id();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $ext = $img->getClientOriginalExtension();
                $imageName = time() . '.' . $ext;
                $profilePath = 'storage/images';
                $img->move(public_path($profilePath), $imageName);
                $imagePath = $profilePath . '/' . $imageName;
            }

            $food = Food::create([
                'user_id' => $userID,
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'image' => $imagePath,
                'video_url' => $request->input('video_url'),
                'cooking_time' => $request->input('cooking_time'),
                'ingredients' => $request->input('ingredients'),
            ]);
            return response()->json($food, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
<<<<<<< HEAD
=======

        // Ensure the user is authenticated
        $user = Auth::user();
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

        // return $request->user();
>>>>>>> show_food
    }

    /**
     * Display the specified resource.
     */

    // public function show(string $id)
    // {

    //     $food = Food::find($id);
    //     if ($food) {
    //         return new FoodResource($food);
    //     } else {
    //         return response()->json(['error' => 'Food not found'], 404);
    //     }
    // }

    public function show(string $id)
    {
<<<<<<< HEAD
        $food = Food::findOrFail($id);

        // Split the ingredients string into an array
        $ingredients = explode(',', $food->ingredients);

        // Trim any leading/trailing whitespace from the ingredients
        $ingredients = array_map('trim', $ingredients);

        return response()->json([
            'id' => $food->id,
            'name' => $food->name,
            'description' => $food->description,
            'ingredients' => $ingredients,
        ]);
=======
        $food = Food::find($id);
        $food= new ShowFoodResource($food);
        return ["success" => true, "data" =>$food];
>>>>>>> show_food
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|integer',
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'video_url' => 'required|url',
            'cooking_time' => 'required|string|max:255',
            'ingredients' => 'required|string',
        ]);

        $food = Food::findOrFail($id);


        $imagePath = $food->image;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $profilePath = 'storage/images';
            $img->move(public_path($profilePath), $imageName);
            $imagePath = $profilePath . '/' . $imageName;
        }

        $food->update([
            'name' => $validatedData['name'],
            'image' => $imagePath,
            'video_url' => $validatedData['video_url'],
            'cooking_time' => $validatedData['cooking_time'],
            'ingredients' => $validatedData['ingredients'],
        ]);

        return response()->json($food, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $food = Food::findOrFail($id);
            if ($food->delete()) {
                return response()->json([
                    'data' => null,
                    'message' => 'Food deleted successfully',
                ], 204);
            } else {
                return response()->json([
                    'data' => null,
                    'error' => 'Failed to delete food',
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json([
                'data' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function listFoodByCategory($id)
    {
        $food = Food::where('category_id', $id)->get();

        if ($food->isEmpty()) {
            return response()->json([
                'message' => 'No food items found for the given category.',
            ], 404);
        }

        return response()->json($food, 200);
    }
}
