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
        dd(1);
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


        $img = $request->profile;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path('/images/'), $imageName);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'profile' => $imageName
        ]);
        return response([
            'message' => 'User created successfully',
            'success' => true,
            'user' => $user
        ], 200);
    }
    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' =>'required|email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password'
        ]);
        if ($validator->fails()) {
            return response([
               'message' => $validator->errors(),
               'success' => false
            ], 400);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response([
               'message' => 'User not found',
               'success' => false
            ], 400);
        }
        $user->password =  Hash::make($request->password);
        $user->save();
        return response([
           'message' => 'Password reset successfully',
           'success' => true
        ], 200);
    }
}
