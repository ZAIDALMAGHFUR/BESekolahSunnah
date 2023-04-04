<?php


namespace App\Http\Controllers\API;

use PHPUnit\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            Log::info($request);
            if (auth()->attempt($credentials)) {
                $token = $request->user()->createToken('authToken')->plainTextToken;
                $username = $request->user()->username;
                return response()->json([
                    'status' => 'success',
                    'meta' => [
                        'token' => $token,
                    ],
                    'data' => [
                        'id'=> $request->user()->id,
                        'username' => $username,
                        'email' => $request->email,
                    ],
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Credentials',
                ], 401);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
