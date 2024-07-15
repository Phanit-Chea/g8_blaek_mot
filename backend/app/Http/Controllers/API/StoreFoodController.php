<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreFood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreFoodController extends Controller
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

            $storeFood = StoreFood::create([
                'user_id' => $userID,
                'food_id' => $id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Food store successfully',
                'data' => $storeFood,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while storing the food.',
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
    public function destroy($id)
    {
        try {
            $storeFood = StoreFood::findOrFail($id);

            // Get the created_at timestamp of the food item
            $createdAt = $storeFood->created_at;

            // Calculate the time 2 minutes after creation
            $deleteTime = $createdAt->addMinutes(2);

            // Schedule the deletion to happen at the calculated time
            $storeFood->delete($deleteTime);

            return response()->json([
                'data' => null,
                'message' => "Food will be deleted 2 minutes after creation",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'data' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
