<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuariosController extends Controller
{

    protected $usuarios;

    public function __construct(User $user)
    {
        $this->usuarios = $user;
    }

    public function dashboard()
    {
        $usuarios = $this->usuarios->all();

        $contagemUsuarios = count($usuarios);
       
        return response("Temos $contagemUsuarios usuarios ativos", 200);
    }

    
}