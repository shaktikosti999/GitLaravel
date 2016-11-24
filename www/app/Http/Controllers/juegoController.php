<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\juego_model as juego;
use App\Models\front\linea_model as linea;

class juegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'juegos' => juego::all()
        );
        return view('back.juego.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = array(
            'lineas' => juego::get_game_lines(),
            'categorias' => linea::get_categories()
        );
        if(count($data['lineas']) < 1)
            return redirect()->back()->with('danger','No existen lineas de juego');
        return view('back.juego.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required|string|min:1|max:50',
            'titulo' => 'required|string|min:1|max:50',
            'linea' => 'required|integer|min:1|max:99',
            'resumen' => 'string',
            'aprender' => 'string',
            'reglas' => 'string'
        ]);

        $evento = juego::store($request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/juego.html'))->with('success','Juego agregado correctamente');
        }
        else{
            return redirect(url('/administrador/juego.html'))->with('error',$evento);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = array(
            'id' => $id,
            'lineas' => juego::get_game_lines(),
            'juego' => juego::find($id),
            'categorias' => linea::get_categories()
        );
        return view('back.juego.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'nombre' => 'required|string|min:1|max:50',
            'titulo' => 'required|string|min:1|max:50',
            'linea' => 'required|integer|min:1|max:99',
            'resumen' => 'string',
            'aprender' => 'string',
            'reglas' => 'string'
        ]);

        $evento = juego::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/juego.html'))->with('success','Juego modificado correctamente');
        }
        else{
            return redirect(url('/administrador/juego.html'))->with('error',$evento);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
