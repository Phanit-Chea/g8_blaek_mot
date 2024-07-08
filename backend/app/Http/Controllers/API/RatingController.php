<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'food_id' => 'required|integer', 
            'stars_rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::create($validated);

        return response()->json($rating, 201);
    }

    public function getRatingStatistics($food_id)
    {
        $ratings = Rating::where('food_id', $food_id)->get();
        $totalUsers = $ratings->count();
    
        //=============Custom percentages for each star=============//
        $starPercentages = [
            1 => "20%",
            2 => "40%",
            3 => "60%",
            4 => "80%",
            5 => "100%",
        ];
    
        //=========Group by the correct column name========//
        $starCounts = $ratings->groupBy('stars_rating')->map->count();
    
        // Calculate the percentage of users who chose each star
        $userPercentages = $starCounts->map(function ($count) use ($totalUsers) {
            return $totalUsers > 0 ? ($count / $totalUsers) * 100 : 0;
        });
    
        //=======Combine the star percentages and user percentages========//
        $combinedPercentages = $userPercentages->map(function ($userPercentage, $star) use ($starPercentages) {
            return [
                'stars_rating' => $star,
                'custom_percentage' => $starPercentages[$star] ?? 0, // Ensure a default value if star not found
                'user_percentage' => $userPercentage,
            ];
        });
    
        //========Convert the collection to an array and reset the keys===========//
        $combinedPercentagesArray = $combinedPercentages->values()->toArray();
    
        return response()->json([
            'total_users' => $totalUsers,
            'combined_percentages' => $combinedPercentagesArray
        ]);
    }
    
    
    
}
