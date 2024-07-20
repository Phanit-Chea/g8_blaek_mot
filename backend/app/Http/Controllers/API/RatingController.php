<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListFeedbackResource;
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
        $ratings = ListFeedbackResource::collection($ratings);
        return response()->json(['success' => true, 'data' => $ratings], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'food_id' => 'required|exists:foods,id',
            'user_id' => 'required|exists:users,id',
            'stars_rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string',
        ]);

        $rating = Rating::create($validated);

        return response()->json($rating, 201);
    }

    public function countUsersRatedFood($foodId)
    {
        $count = Rating::where('food_id', $foodId)
            ->distinct('user_id')
            ->count('user_id');

        return response()->json(['count' => $count]);
    }

    public function calculateAverageRating($foodId)
    {
        $ratings = Rating::where('food_id', $foodId)
            ->selectRaw('avg(stars_rating) as average_rating, count(user_id) as count_users')
            ->first();

        $averageRating = number_format($ratings->average_rating ?? 0, 1);
        $feedback = Rating::where('food_id', $foodId)->pluck('feedback')->toArray();

        return response()->json([
            'average_rating' => $averageRating,
            'feedback' => $feedback
        ]);
    }

    public function show($foodId)
    {
        $feedbackData = Rating::where('food_id', $foodId)
            ->select('ratings.id', 'ratings.stars_rating', 'ratings.feedback', 'users.name', 'users.profile')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->get()
            ->toArray();

    return response()->json(['average_rating' => $averageRating]);
}

    public function destroy($id)
    {
        $rating = Rating::find($id);

        if ($rating) {
            $rating->delete();
            return response()->json(['message' => 'Comment deleted successfully.']);
        } else {
            return response()->json(['message' => 'Comment not found.'], 404);
        }
    }
}