<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katkeluar;

class CatKeluarController extends Controller
{
    public function index(){
        return Katkeluar::all();
    }

    public function store(Request $request) {

    try{
        Katkeluar::create([
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
            $kategori = Katkeluar::find($id);
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
        $kategori= Katkeluar::find($id);
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
