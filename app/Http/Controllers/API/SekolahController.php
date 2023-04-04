<?php

namespace App\Http\Controllers\API;
use App\Models\nama_sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = nama_sekolah::all();
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'deskripsi' => 'required',
            'website_sekolah' => 'required',
            'tingkatan_sekolah' => 'required',
            'logo_sekolah' => 'required|image',
            'foto_sekolah' => 'required|image',
            'foto_sekolah2' => 'nullable|image',
            'foto_sekolah3' => 'nullable|image',
            'foto_sekolah4' => 'nullable|image',
        ]);
    
        $sekolah = nama_sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'deskripsi' => $request->deskripsi,
            'website_sekolah' => $request->website_sekolah,
            'tingkatan_sekolah' => $request->tingkatan_sekolah,
            'logo_sekolah' => $request->file('logo_sekolah')->store('public/images'),
            'foto_sekolah' => $request->file('foto_sekolah')->store('public/images'),
            'foto_sekolah2' => $request->file('foto_sekolah2')->store('public/images'),
            'foto_sekolah3' => $request->file('foto_sekolah3')->store('public/images'),
            'foto_sekolah4' => $request->file('foto_sekolah4')->store('public/images'),
        ]);
    
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    
    public function edit($id)
    {
        $sekolah = nama_sekolah::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'deskripsi' => 'required',
            'website_sekolah' => 'required',
            'tingkatan_sekolah' => 'required',
            'logo_sekolah' => 'required|image',
            'foto_sekolah' => 'required|image',
            'foto_sekolah2' => 'nullable|image',
            'foto_sekolah3' => 'nullable|image',
            'foto_sekolah4' => 'nullable|image',
        ]);
    
        $sekolah = nama_sekolah::findOrFail($id);
        $sekolah->update([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'deskripsi' => $request->deskripsi,
            'website_sekolah' => $request->website_sekolah,
            'tingkatan_sekolah' => $request->tingkatan_sekolah,
            'logo_sekolah' => $request->file('logo_sekolah')->store('public/images'),
            'foto_sekolah' => $request->file('foto_sekolah')->store('public/images'),
            'foto_sekolah2' => $request->file('foto_sekolah2')->store('public/images'),
            'foto_sekolah3' => $request->file('foto_sekolah3')->store('public/images'),
            'foto_sekolah4' => $request->file('foto_sekolah4')->store('public/images'),
        ]);
    
        return response()->json([
            'status' => 'success',
            'data' => $sekolah
        ], 200);
    }

    public function destroy($id)
    {
        $sekolah = nama_sekolah::find($id);
        $sekolah->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Sekolah Berhasil Dihapus'
        ], 200);
    }
}
