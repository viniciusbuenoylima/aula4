<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;


class HeroiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Heroi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('herois.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'nome'               => 'required|alpha|max:100|min:3',
            'identidade_secreta' => 'alpha|max:255',
            'origem'             => 'alpha|max:100',
            'foto'               => 'file',
        ]);

    $heroi = new Heroi();
    $heroi->nome               = $req->nome; 
    $heroi->identidade_secreta = $req->identidade_secreta; 
    $heroi->origem             = $req->origem; 
    $heroi->forca              = $req->forca; 
    $heroi->terraqueo          = ($req->terraqueo && $req->terraqueo ==='on') ? true:false; 
    $heroi->pode_voar          = ($req->pode_voar && $req->pode_voar ==='on') ? true:false;     
    //convertendo arquivo binário para base64
    $path = $req->file('foto')->getRealPath();
    $foto = file_get_contents($path);
    $base64 = base64_encode($foto);
    $heroi-> foto = $base64;        

    $heroi->save();        

    return redirect ('herois.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
