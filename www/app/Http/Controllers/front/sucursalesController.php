<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\front\sucursal_model as sucursal;
use \App\Models\front\promocion_model as promocion;
use \App\Models\front\linea_model as linea;

class sucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null){
        $sucursal = sucursal::find_by_slug($slug);
        $data = [
            'sucursal' => $sucursal,
            'sucursales' => sucursal::find_all(),
            'galeria' => sucursal::get_gallery($sucursal->id_sucursal),
            'promociones' => promocion::find_all(['id_sucursal' => $sucursal->id_sucursal]),
            'juegos' => linea::get_games(['id_sucursal' => $sucursal->id_sucursal]),
            'torneos' => linea::find_all_tournaments(['id_sucursal' => $sucursal->id_sucursal])

        ];

        // dd($data);
        return view('front.sucursales.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){}

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
    public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
