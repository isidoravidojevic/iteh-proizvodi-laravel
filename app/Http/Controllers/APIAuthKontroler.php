<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class APIAuthKontroler extends Controller
{

    public function registracijaKorisnika(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Message' => $validator->errors()
            ]);
        }


        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return response()->json([
            'Message' => 'Successfully registered'
        ]);
    }


    public function loginKorisnika(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'Message' => $validator->errors()
            ]);
        }

        if (!Auth::attempt($request->only('email', 'password')))
            return response()->json([
                'Message' => 'Error login'
            ]);

        $user = User::where('email', $request['email'])->first();
        $login_token = $user->createToken('login_token_auth')->plainTextToken;

        return response()->json([
            'Message' => 'Successfully logged in',
            'Auth Token' => $login_token
        ]);
    }


    public function logoutKorisnika()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'Message' => 'Successfully logged out',
        ]);
    }
}
