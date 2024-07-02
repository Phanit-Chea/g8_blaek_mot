<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FoodRequest;
use Exception;

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
    // FoodController.php
    public function store(FoodRequest $request)
    {
        // Ensure the request comes from an authenticated user
        $userID = 1;
        try {
            $imagePath = null;
            if ($request->hasFile('image_path')) {
                $img = $request->file('image_path');
                $ext = $img->getClientOriginalExtension();
                $imageName = time() . '.' . $ext;
                $profilePath = 'storage/images';
                $img->move(public_path($profilePath), $imageName);
                $imagePath = $profilePath . '/' . $imageName;
            }

            $food = Food::create([
                'user_id' => $userID,
                'name' => $request->input('name'),
                'image' => $imagePath,
                'video_url' => $request->input('video_url'),
                'cooking_time' => $request->input('cooking_time'),
                'nutrition' => $request->input('nutrition'),
                'ingredients' => $request->input('ingredients'),
            ]);
            return response()->json($food, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
