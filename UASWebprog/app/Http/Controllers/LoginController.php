<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $cek = User::where('id', Auth::user()->id)
                ->firstOrfail();

            if ($cek->roles != "admin") {
                return response()->json([
                    'status' => 405,
                    'error' => 'Anda Tidak Memiliki Hak Akses Sebagai Admin!'
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'error' => 'Anda Berhasil Masuk'
                ]);
            }
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Pastikan Masukkan Email dan Password Dengan Valid!'
            ]);

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
