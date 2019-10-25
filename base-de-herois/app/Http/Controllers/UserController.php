<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //usando query builder
    public function index(Request $req)
    {
        $req->validate([
            'nome' => 'nullable|alpha|min:3\max:255'
        ]);

        $qb = DB::table('users')->select(['name', 'id']);
        if ($req->nome) {
            $qb->where('name', 'like', "$req->nome%");
        }
        $usuarios = $qb->get();
        return view('usuarioslist', ['usu' => $usuarios]);
    }

    //usando model elloquent
    public function index2(Request $req)
    {
        $req->validade([
            'nome' => 'nullable|alpha|min:3\max:255'
        ]);

        $qb = User::select(['name', 'id']);
        if ($req->nome) {
            $qb->where('name', 'like', "$req->nome%");
        }
        $usuarios = $qb->get();

        return view('usuarioslist', ['usu' => $usuarios]);
    }
}
