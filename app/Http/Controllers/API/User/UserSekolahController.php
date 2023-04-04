<?php

namespace App\Http\Controllers\API\User;

use App\Models\nama_sekolah;
use App\Models\BookMark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSekolahController extends Controller
{
    public function index()
    {
        $sekolah = nama_sekolah::all();
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    public function show($id)
    {
        $sekolah = nama_sekolah::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    public function store(Request $request, $users_id, $nama_sekolah_id)
    {
        $bookmark = BookMark::create([
            'users_id' => $users_id,
            'nama_sekolah_id' => $nama_sekolah_id,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Bookmark',
            'data' => $bookmark
        ], 200);
    }
    
}
