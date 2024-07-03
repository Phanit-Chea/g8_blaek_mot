<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        // $categories = ShowCategoryResource::collection($categories);
        return response(['success' => true, 'data' => $categories], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::createOrUpdate($request);
        return response()->json([
            'data' => $category
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $category = Category::find($id);
        // $category = new ShowCategoryResource($category);
        // return ["success" => true, "data" => $category];

        $category = Category::find($id);
        $category = new ShowCategoryResource($category);
        return ["success" => true, "data" => $category];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::createOrUpdate($request, $id);
        return response()->json([
            "success" => true, 
            "data" => new ShowCategoryResource($category), 
            "Message" => "The Category was updated successfully!"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories -> delete();
        return ["success" => true, "Message" => "The Category was deleted successfully!"];
    }
}
