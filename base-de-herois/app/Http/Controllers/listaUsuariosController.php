<?php
namespace App\htpp\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Suport\Facades\DB;

class UserController extends Controller{

    public function index(){
        $usuarios = DB::table('users')->select(['name'])->get();
        return view('usuarioslist', ['usu'=> $usuarios]);
    }

}


?>