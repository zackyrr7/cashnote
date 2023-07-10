<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Katmasuk;
use App\Models\Transmasuk;
use App\Models\User;

class TransMasukController extends Controller
{
    public function indexkategori($id)
    {
        try {
            $kategori = Katmasuk::findOrFail($id);
        return $transaksi = Transmasuk::where('katmasuks_id', $id)->get();
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
            $user = User::findOrFail($id);
        return $transaksi = Transmasuk::where('users_id', $id)->get();
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
            $transaksi = katmasuk::findOrFail($request->id);
            
            $transaksi = new Transmasuk();
            $transaksi -> users_id = $request->users_id;
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
