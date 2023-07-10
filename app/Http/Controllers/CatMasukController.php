<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katmasuk;
use App\Models\User;

class CatMasukController extends Controller
{
    public function index($id){
        try {
            $user = User::find($id);
        return $kategori = Katmasuk::where('users_id', $id)->get();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Server Error!'
            ]);
        }
    }

    public function store(Request $request) {

    try{
       
        $kategori = User::findOrFail($request->id);
        
            $kategori = new Katmasuk();
            $kategori -> nama = $request->nama;
            $kategori -> users_id = $request->id;
            $kategori->save();
            
           
        return response()->json([
            'status' => 200,
            'message' => 'Kategori berhasil dibuat'
        ]);
    }catch (\Throwable $th) {
        return response()->json([
            'status' => 201,
            'message' => 'Terjadi Kesalahan'
        ]);
    }
    }

    public function update(Request $request){
        try{
            $kategori = Katmasuk::findOrFail($request->id);
        
                $kategori -> nama = $request->nama;
                // $kategori -> users_id = $request->id;
    
                $kategori->save();

            return response()->json([
                'status' => 200,
                'message' => 'Kategori berhasil di Update'
            ]);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Terjadi Kesalahan'
            ]);
        }
    }


    public function delete($id){
        $kategori= Katmasuk::find($id);
        if(!$kategori){
            return response()->json([
                'status' => 404,
                'message' => "kategori tidak ditemukan"
            ]);
        }
        $kategori->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Kategori berhasil di Hapus'
        ]);
    }
}
