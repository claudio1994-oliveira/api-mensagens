<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends  Controller
{
    protected $jwt;

    public function __construct(JWT $jwt)
    {
        $this->jwt = $jwt;
    }
    public function login(Request $request)
    {
        // validando corpo da requisição
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]
        );

        $user = User::where('email', $request->email)->first();

        if(is_null($user) || !Hash::check($request->password, $user->password) ){
            return response()->json('Usuário ou senha inválido', 401);
        }

        //gerando o token
        $token = JWT::encode(['email' => $request->email], env('JWT_KEY'));

        return ['access_token' => $token];
    }


}
