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
    public function index()
    {
        $ratings = Rating::all();
        return response()->json(['success' => true, 'data' => $ratings], 200);
    }

    public function store(Request $request)
    {
        $rating = Rating::create([
            'food_id' => $request->food_id,
            'user_id' => $request->user_id,
            'stars_rating' => $request->stars_rating,
        ]);

        return response()->json($rating, 201);
    }
    //=======
    public function countUsersRatedFood($foodId)
    {
        $count = Rating::where('food_id', $foodId)
           
            ->count('user_id');

        return response()->json(['count' => $count]);
    }
    
    public function calculateAverageRating($foodId)
{
    $totalStars = Rating::where('food_id', $foodId)->sum('stars_rating');
    $countUsers = Rating::where('food_id', $foodId)->count('user_id');

    if ($countUsers > 0) {
        $averageRating = $totalStars / $countUsers;
    } else {
        $averageRating = 0; // Handle the case where no users have rated yet
    }

    //======Round the average rating to the nearest whole number=========//
    $averageRating = round($averageRating);

    return response()->json(['average_rating' => $averageRating]);
}

}
