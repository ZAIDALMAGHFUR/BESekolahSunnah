<?php


namespace App\Http\Controllers\API;

use PHPUnit\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            Log::info($request);
            if (auth()->attempt($credentials)) {
                $token = $request->user()->createToken('authToken')->plainTextToken;
                $first_name = $request->user()->first_name;
                $last_name = $request->user()->last_name;
                return response()->json([
                    'status' => 'success',
                    'meta' => [
                        'token' => $token,
                    ],
                    'data' => [
                        'id'=> $request->user()->id,
                        'username' => $first_name . ' ' . $last_name,
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
