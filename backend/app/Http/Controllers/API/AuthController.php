<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data'=>User::all(),'message' => 'Hello World'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid image format or size',
                'success' => false
            ], 400);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'success' => false
            ], 404);
        }

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('public/StoreImages');
            $profileUrl = Storage::url($path);

            // Update the user's profile image URL in the database
            $user->update(['profile' => $profileUrl]);

            return response()->json([
                'message' => 'Profile image updated successfully',
                'success' => true,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'message' => 'No image provided for update',
            'success' => false
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user_exist = User::where('email', $request->email)->first();
        if ($user_exist) {
            return response([
                'message' => 'User already exist !',
                'success' => false
            ], 400);
        }

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('public/StoreImages');
            $ProfileUrl = Storage::url($path);
        } else {
            $ProfileUrl = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'profile' => $ProfileUrl
        ]);
        return response([
            'message' => 'User created successfully',
            'success' => true,
            'user' => $user
        ], 200);
    }
}
