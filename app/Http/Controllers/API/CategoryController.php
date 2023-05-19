<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  public function store(Request $request) {
    try {
      $validator = Validator::make($request->all() , [
        'name' => 'required'
      ]);
      
      if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
      }
      
      $category = Category::create([
        'name' => $request->name
      ]);
      
      return response()->json(['message' => 'Category added succesfully', 'data' => $category]);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function show($id = null) {
    try {
      if ($id) {
        $category = Category::find($id);
        
        if (!$category) {
          return response()->json(['message' => 'Category not found'], 404);
        }
        
        return response()->json(['category' => $category], 200);
      } else {
        $category = Category::all();
        
        return response()->json(['categories' => $category], 200);
      }
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function edit(Request $request, $id) {
    try {
      $category = Category::find($id);
  
      if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
      }
      
      $category->update([
        'name' => $request->input('name')
      ]);
      
      return response()->json(['message' => 'Category Updated Succesfully'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function delete($id) {
    try {
      $category = Category::findOrFail($id);
      $category->delete();
      
      return response()->json(['message' => 'Category Deleted Succesfully'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
}
