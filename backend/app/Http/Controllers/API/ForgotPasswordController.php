<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $token = Str::random(60);

        PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
            'expires_at' => now()->addHours(1),
        ]);

        try {
            Mail::to($user->email)->send(new SendMail($user, $token));
            Log::info("Here is reset code: $token " . $user->email);
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Password reset link sent to your email', 'token' => $token]);
    }
}
