<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\userRegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        //
    }

    public function register(Request $request)
    {
        \Log::info('Register request data: ', $request->all());
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|same:password',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phoneNumber' => 'required|string',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
                'success' => false
            ], 422);
        }
    
        $img = $request->file('profile');
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $profilePath = 'storage/images';
        $img->move(public_path($profilePath), $imageName);
        $profile = $profilePath . '/' . $imageName;
    
        // Create user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'address' => $request->address,
            'profile' => $profile,
            'phoneNumber' => $request->phoneNumber
        ]);
    
        return response()->json([
            'message' => 'User created successfully',
            'success' => true,
            'user' => new userRegisterResource($user)
        ], 201);
    }
<<<<<<< HEAD
    // UserController.php

}
=======
}
>>>>>>> develop
