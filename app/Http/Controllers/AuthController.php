<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ]);
    
    if ($validator->fails()) {
      return response()->json(['error' => $validator->errors()], 422);
    }
    
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);
    
    return response()->json(['message' => 'User registered successfully'], 201);
  }
  
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $token = $user->createToken('API_blog')->plainTextToken;
      return response()->json(['token' => $token], 200);
    } else {
      return response()->json(['error' => 'Invalid credentials'], 401);
    }
  }
  
  public function getUser(Request $request)
  {
    return response()->json(['user' => $request->user()], 200);
  }
  
  public function logout(Request $request)
  {
    $request->user()->tokens()->delete();
    
    return response()->json(['message' => 'Logged out successfully'], 200);
  }
}
