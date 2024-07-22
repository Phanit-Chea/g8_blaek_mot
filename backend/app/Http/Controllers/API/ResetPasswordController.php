<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends Controller
{
    // public function sendResetLink(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     // Generate a token and save it in the password_resets table
    //     $token = str_random(60);
    //     DB::table('password_resets')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => now(),
    //     ]);

    //     // Send the reset link via email (You can use a Mailable here)
    //     // Mail::send(...);

    //     return response()->json(['message' => 'Reset link sent to your email.']);
    // }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $passwordReset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->where('created_at', '>', now()->subMinutes(config('auth.passwords.users.expire', 60)))
            ->first();

        if (!$passwordReset) {
            return response()->json(['message' => 'This password reset token is invalid.'], 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'We can\'t find a user with that email address.'], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset record
        DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->delete();

        return response()->json(['message' => 'Password has been successfully reset.']);
    }


    // Check email uniqueness
    public function checkEmailUnique(Request $request): JsonResponse
    {
        $email = $request->email;
        $isUnique = !User::where('email', $email)->exists();

        return response()->json(['unique' => $isUnique, 'message' => $isUnique ? 'Email is available' : 'Email already exists']);
    }
}
