<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\katkeluar;
use App\Models\Transkeluar;
use App\Models\User;

class TranskeluarController extends Controller
{
    public function indexkategori($id)
    {
        try {
            $kategori = katkeluar::find($id);
        return $transaksi = Transkeluar::where('katkeluars_id', $id)->get();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Server Error!'
            ]);
        }

        
    }

    public function indexuser($id)
    {
        try {
            $user = User::find($id);
        return $transaksi = Transkeluar::where('users_id', $id)->get();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Server Error!'
            ]);
        }

        
    }





    public function store(Request $request)
    {
        try {
            $transaksi = katkeluar::findOrFail($request->id);
            
            $transaksi = new Transkeluar();
            $transaksi -> users_id = $request->users_id;
            $transaksi -> katkeluars_id = $request->id;
            $transaksi -> nama = $request->nama;
            $transaksi-> jumlah = $request->jumlah;
            $transaksi-> tanggal = $request->tanggal;

            $transaksi->save();
            return response()->json([
                'status' => 200,
                'message' => 'Transaksi berhasil dibuat'
            ]);
         
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Terjadi Kesalahan'
            ]);
        }
    }


    public function update(Request $request)
    {
        try {
            
            $transaksi = Transkeluar::findOrFail($request->id);
        
                $transaksi -> nama = $request->nama;
                $transaksi-> jumlah = $request->jumlah;
                $transaksi-> tanggal = $request->tanggal;
    
                $transaksi->save();
                
            return response()->json([
                'status' => 200,
                'message' => 'Transaksi berhasil diupdate'
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 201,
                'message' => 'Terjadi Kesalahan'
            ]);
        }
    }

    public function delete($id){
        $transaksi= Transkeluar::find($id);
        if(!$transaksi){
            return response()->json([
                'status' => 404,
                'message' => "transaksi tidak ditemukan"
            ]);
        }
        $transaksi->delete();
        return response()->json([
            'status' => 200,
            'message' => 'transaksi berhasil di Hapus'
        ]);
    }
}
