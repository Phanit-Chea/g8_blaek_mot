<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\folder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = folder::all();
        return response()->json(['success' => true, 'data' => $user], 200);
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
            return response()->json(['errors' => $validator->errors()], 402);
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
    
        $folder = new folder();
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
        $folder = folder::store($request, $id);
        return response()->json(
            [
            'success' => true, 
            'message' => 'folder was updated successfully'
        ], 200);    
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $user = auth()->user();
    
        $folder = folder::where('user_id', $user->id)
            ->where('id', $id)
            ->first();
    
        if (!$folder) {
            return response()->json(['error' => 'Folder not found'], 404);
        }
    
        $folder->delete();
    
        return response()->json(['success' => true, 'message' => 'Folder deleted successfully']);
   
    }
}
