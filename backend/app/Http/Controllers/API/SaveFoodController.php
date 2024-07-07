<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SaveFood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class SaveFoodController extends Controller
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
    public function store($id)
    {
        try {
            $userID = Auth::id();

            $saveFood = SaveFood::create([
                'user_id' => $userID,
                'food_id' => $id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Food saved successfully',
                'data' => $saveFood,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the food.',
                'error' => $e->getMessage(),
            ], 500);
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
        // Find the SaveFood record by ID
        $saveFood = SaveFood::find($id);

        if (!$saveFood) {
            return response()->json([
                'success' => false,
                'message' => 'Food not found',
            ], 404);
        }

        try {
            // Delete the SaveFood record
            $saveFood->delete();

            return response()->json([
                'success' => true,
                'message' => 'Food deleted successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete food',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
