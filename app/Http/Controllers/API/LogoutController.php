<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        // Log::info($request);
        // return $user->currentAccessToken();
        Log::info('test');
        return response()->json([
            'status' => 'success',
            'message' => 'Logout Success',
            'nama' => "Berhasil Keluar atas nama $user->username"
        ], 200);
    }
}
