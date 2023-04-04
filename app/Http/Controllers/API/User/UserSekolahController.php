<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use App\Models\BookMark;
use App\Models\nama_sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSekolahController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
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
        // Cek apakah user dan sekolah dengan id yang diberikan ada di database
        $user = User::find($users_id);
        $nama_sekolah = nama_sekolah::find($nama_sekolah_id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User dengan id tersebut tidak ditemukan'
            ], 404);
        }
        if (!$nama_sekolah) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sekolah dengan id tersebut tidak ditemukan'
            ], 404);
        }
    
        // Tambahkan data bookmark ke dalam tabel
        $bookmark = new BookMark();
        $bookmark->users_id = $users_id;
        $bookmark->nama_sekolah_id = $nama_sekolah_id;
        $bookmark->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menambahkan Bookmark',
            'data' => $bookmark
        ], 200);
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $sekolah = nama_sekolah::where('nama_sekolah', 'like', "%$keyword%")->get();
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }
}
