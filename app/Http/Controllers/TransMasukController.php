<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katmasuk;
use App\Models\Transmasuk;

class TransMasukController extends Controller
{
    public function index($id)
    {
        try {
            $kategori = Katmasuk::find($id);
        return $transaksi = Transmasuk::where('katmasuks_id', $id)->get();
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
            $transaksi = Katmasuk::findOrFail($request->id);

            $transaksi = new Transmasuk();
            $transaksi -> katmasuks_id = $request->id;
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
            
            $transaksi = Transmasuk::findOrFail($request->id);
        
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
        $transaksi= Transmasuk::find($id);
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
