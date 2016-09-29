<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\sucursal;
class sucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'sucursales' => sucursal::all()
        );
        return view('back.sucursal.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('back.sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required|string|max:50|min:1',
            'direccion' => 'required|string|min:5|max:255',
            'horario' => 'required|string',
            'instrucciones' => 'required|string',
            'telefono' => 'required|string'
        ]);
        $evento = sucursal::store($request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/sucursal.html'))->with('success','Sucursal agregada correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error',$evento);
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
        $data=array(
            'id' => $id,
            'sucursal' => sucursal::find($id)
        );
        return view('back.sucursal.edit',$data);
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
            'nombre' => 'required|string|max:50|min:1',
            'direccion' => 'required|string|min:5|max:255',
            'horario' => 'required|string',
            'instrucciones' => 'required|string',
            'telefono' => 'required|string'
        ]);
        $evento = sucursal::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/sucursal.html'))->with('success','Sucursal agregada correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error',$evento);
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
