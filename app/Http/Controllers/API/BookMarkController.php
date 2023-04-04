<?php

namespace App\Http\Controllers\API;

use App\Models\BookMark;
use App\Models\nama_sekolah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    public function index()
    {
        $sekolah = nama_sekolah::all();
        $bookmark = BookMark::all();
        return response()->json([
            'status' => 'success',
            'data' => $bookmark,
            'sekolah' => $sekolah
        ], 200);
    }
}
