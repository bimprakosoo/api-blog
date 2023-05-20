<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  public function store(Request $request) {
    try {
      $validator = Validator::make($request->all() , [
        'title' => 'required',
        'requestContent' => 'required',
        'category_id' => 'required',
        'tags' => 'required|array',
        'tags.*' => 'exists:tags,id', // Ensure all tag IDs exist in the "tags" table
      ]);
      
      if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
      }
      
      $post = Post::create([
        'title' => $request->title,
        'content' => $request->requestContent,
        'category_id' => $request->category_id,
      ]);
  
      $validatedData = $validator->validated();
      $post->tags()->attach($validatedData['tags']);
  
      return response()->json(['message' => 'Post added succesfully', 'data' => $post], 201);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function show($id = null) {
    try {
      $query = Post::query();
      if ($id) {
        $post = $query->where('id', $id);
        
        if (!$post) {
          return response()->json(['message' => 'Post not found'], 404);
        }
        
      }
        $post = $query->with('category', 'tags', 'comments')->get();
        
        return response()->json($post, 200);
      
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function edit(Request $request, $id) {
    try {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'requestContent' => 'required',
        'category_id' => 'required',
        'tags' => 'required|array',
        'tags.*' => 'exists:tags,id',
      ]);
    
      if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
      }
    
      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->content = $request->requestContent;
      $post->category_id = $request->category_id;
      $post->save();
    
      $post->tags()->sync($request->tags);
    
      return response()->json(['message' => 'Post updated successfully', 'data' => $post], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function delete($id) {
    try {
      $post = Post::findOrFail($id);
      $post->delete();
      
      return response()->json(['message' => 'Post Deleted Succesfully'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
  
  public function comment(Request $request) {
    try {
      $validator = Validator::make($request->all() , [
        'comment' => 'required',
        'post_id' => 'required',
      ]);
      
      if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
      }
      
      $comment = Comment::create([
        'post_id' => $request->post_id,
        'content' => $request->comment,
      ]);
      
      return response()->json(['message' => 'Post added succesfully', 'data' => $comment], 201);
    } catch (\Exception $e) {
      return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
    }
  }
}
