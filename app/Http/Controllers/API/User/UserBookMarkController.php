<?php

namespace App\Http\Controllers\API\User;

use App\Models\BookMark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBookMarkController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $bookmark = BookMark::where('users_id', $user->id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $bookmark
        ], 200);
    }
    
}
