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
        //
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
            'age' => 'required|string',
            'password' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //Get Image
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
            'age' => $request->age,
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
