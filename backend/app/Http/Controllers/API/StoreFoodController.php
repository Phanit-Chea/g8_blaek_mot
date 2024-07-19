<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreFood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class StoreFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storeFood = StoreFood::all();
        return response([
            'success' => true,
            'data' => $storeFood
        ], 200);
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
    public function show()
    {
       
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

            if ($storeFood->delete()) {
                return response()->json([
                    'data' => null,
                    'message' => 'Food store deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'data' => null,
                    'error' => 'Failed to delete store food',
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json([
                'data' => null,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function listAllStoreFood(){
        try {
            $id = Auth::id();
            $storeFood = StoreFood::join('food', 'store_food.food_id', '=', 'food.id')
                ->where('store_food.user_id', $id)
                ->select('food.name', 'food.image', 'store_food.id as store_food_id')
                ->get();
    
            return response()->json(['storefood' => $storeFood]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
