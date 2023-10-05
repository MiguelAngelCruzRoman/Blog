<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $usuario = new UserModel();
        $usuarios = $usuario->findAll();

        $data = [
            'usuarios' => $usuarios
        ];

        // dd($usuarios); //sirve para ver las tablas
        return view('users/index', $data);
    }

    public function usuarios(){
        $db = \Config\Database::connect();
        $usuarios = $db->query('select * from users')->getResultArray();

        $data = [
            'usuarios' => $usuarios
        ];

        return view('users/usuarios', $data);
    }

    public function usuarios2(){
        $db = \Config\Database::connect();
        $usuarios = $db->query('select username, password, status from users')->getResultArray();

        $data = [
            'usuarios' => $usuarios
        ];

        return view('users/usuarios2',$data);
    }

    public function usuarios3(){
        $db = \Config\Database::connect();
        $usuarios = $db->query('select * from users as u join userinfo as ui on u.id = ui.id')->getResultArray();

        $data = [
            'usuarios' => $usuarios
        ];

        return view('users/usuarios3',$data);
    }
}
