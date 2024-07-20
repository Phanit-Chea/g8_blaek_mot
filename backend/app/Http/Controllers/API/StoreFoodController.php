<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreFood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

            // Call the method to delete old records
            $this->deleteOldStoreFoods();

            return response()->json([
                'success' => true,
                'message' => 'Food stored successfully',
                'data' => $storeFood,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store food.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete StoreFood records older than 4 minutes.
     */
    protected function deleteOldStoreFoods()
    {
        try {
            $expirationTime = Carbon::now()->subMinutes(10080);
            $deleted = StoreFood::where('created_at', '<', $expirationTime)->delete();

            // Optionally log the number of records deleted
            \Log::info("Deleted $deleted old StoreFood records.");

        } catch (Exception $e) {
            // Handle exceptions if needed
            \Log::error('Error deleting old StoreFood records: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Implement show method if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement update method if needed
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
                    'message' => 'StoreFood deleted successfully',
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
