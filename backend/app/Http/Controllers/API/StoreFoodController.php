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
                'message' => 'Food fail to store.',
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
    
            $createdAt = $storeFood->created_at;
    
            $deleteTime = $createdAt->addMinutes(2);
    
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
