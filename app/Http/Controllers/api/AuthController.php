<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use App\Models\Transkeluar;
use App\Models\Transmasuk;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            
            'confirm_password'=>'required|same:password'
        ]);
        if($validator->fails()){
            return response()->json([
                'succes'=> False,
                'message'=> 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }
        $input = $request->all();
        $input['password']= bcrypt($input['password']);
        $input['role'] = 'user';
        $user =User::create($input);

        $succes['token']= $user->createToken('auth_token')->plainTextToken;
        $succes['name'] = $user->name;
        $succes['id'] = $user->id;

         return response()->json([
            'succes' => true,
            'message'=> 'Sukses mendaftar',
            'data' => $succes
        ]);

    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            // $succes['token']= $auth->createToken('auth_token')->plainTextToken;
            // $succes['name'] = $auth->name;
            // $succes['role'] = $auth->role;
            // $succes['id'] = $auth->id;
            
            $nama =$auth->name;
            $id = $auth->id;
            $token = $auth->createToken('auth_token')->plainTextToken;

            $keluar = Transkeluar::where('users_id', $auth->id)->get();
            $transkeluar = 0;
            foreach ($keluar as $klr){
                $transkeluar += $klr->jumlah;
            }

            $masuk = Transmasuk::where('users_id', $auth->id)->get();
            $transmasuk = 0;
            foreach ($masuk as $msk){
                $transmasuk += $msk->jumlah;
            }
            return response()->json([
                'succes' => true,
                'message'=> 'Sukses login',
                'nama' => $nama,
                'id' => $id,
                'token' => $token,
                'transkeluar'=> $transkeluar,
                'transmasuk'=> $transmasuk
            ]);
        } else{
            return response()->json([
            'succes' => False,
            'message'=> 'Email atau Password salah',
            'data' => null
        ]);
        }
    }

    public function changeRole(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            $auth->role = $request->role;
            $auth->save();
            $succes['token']= $auth->createToken('auth_token')->plainTextToken;
            $succes['name'] = $auth->name;
            $succes['id'] = $auth->id;

            return response()->json([
                'succes' => true,
                'message'=> 'Sukses login',
                'data' => $succes
            ]);
        } else{
            return response()->json([
            'succes' => False,
            'message'=> 'Email atau Password salah',
            'data' => null
        ]);
        }
    }
}
