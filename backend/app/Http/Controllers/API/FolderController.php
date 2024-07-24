<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Folder; // Ensure the model is correctly named and imported
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Folder::all(); // Fetch all folders
        return response()->json(['success' => true, 'data' => $folders], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data using the Validator facade
        $validator = Validator::make($request->all(), [
            'folder_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Changed to 422 for validation errors
        }

        $user = $request->user();

        if (!$user) {
            // Log the error
            Log::error('Unauthenticated request', [
                'request' => $request->all(),
                'headers' => $request->headers->all(),
            ]);
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $folder = new Folder();
        $folder->user_id = $user->id;
        $folder->folder_name = $request->folder_name;
        $folder->save();

        return response()->json(['success' => true, 'message' => 'Folder created successfully', 'folder' => $folder], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $folder = Folder::find($id);

        if (!$folder || $folder->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Folder not found or unauthorized'], 404);
        }

        $folder->update($request->all()); // You might want to specify which fields to update
        return response()->json([
            'success' => true, 
            'message' => 'Folder was updated successfully'
        ], 200);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $folder = Folder::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$folder) {
            return response()->json(['error' => 'Folder not found'], 404);
        }

        $folder->delete();

        return response()->json(['success' => true, 'message' => 'Folder deleted successfully']);
    }

    public function listByUser()
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $folders = Folder::where('user_id', $userId)->get();

        return response()->json(['success' => true, 'data' => $folders], 200);
    }
}
