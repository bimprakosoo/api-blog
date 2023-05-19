<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
  public function store(Request $request) {
    try {
      $validator = Validator::make($request->all() , [
        'name' => 'required'
      ]);
      
      if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
      }
      
      $Tags = Tags::create([
        'name' => $request->name
      ]);
      
      return response()->json(['message' => 'Tag added succesfully', 'data' => $Tags]);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function show($id = null) {
    try {
      if ($id) {
        $Tags = Tags::find($id);
        
        if (!$Tags) {
          return response()->json(['message' => 'Tag not found'], 404);
        }
        
        return response()->json(['Tags' => $Tags], 200);
      } else {
        $Tags = Tags::all();
        
        return response()->json(['Tags' => $Tags], 200);
      }
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function edit(Request $request, $id) {
    try {
      $Tags = Tags::find($id);
      
      if (!$Tags) {
        return response()->json(['message' => 'Tag not found'], 404);
      }
      
      $Tags->update([
        'name' => $request->input('name')
      ]);
      
      return response()->json(['message' => 'Tag Updated Succesfully'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function delete($id) {
    try {
      $Tags = Tags::findOrFail($id);
      $Tags->delete();
      
      return response()->json(['message' => 'Tag Deleted Succesfully'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
}
