<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katmasuk;

class CatMasukController extends Controller
{
    public function index(){
        return Katmasuk::all();
    }

    public function store(Request $request) {

    try{
        Katmasuk::create([
            'nama'=>$request->nama
           
        ]);
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

    public function update(Request $request, $id){
        try{
            $kategori = Katmasuk::find($id);
            if(!$kategori){
                return response()->json([
                    'status' => 404,
                    'message' => "kategori tidak ditemukan"
                ]);
            }

            $kategori->nama = $request->nama;
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
