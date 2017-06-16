<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\configuracion_model as configuracion;
use App\Models\front\sucursal_model as sucursal;


class configuracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = [
            'configuracion' => configuracion::all()
        ];

        return view('back.configuracion.index',$data);
    }

    public function store(Request $request){
        $evento = configuracion::store($request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/configuracion.html'))->with('success','configuracion agregar');
        }
        else{
            return redirect(url('/administrador/configuracion.html'))->with('error',$evento);
        }
    }

    public function edit($id){
        $data = array(
            'id'=>$id,
            'configuracion' => configuracion::find($id)
        );

        return view('back.configuracion.edit',$data);
    }

    public function update(Request $request, $id){
        $evento = configuracion::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/configuracion.html'))->with('success','configuracion Modificar');
        }
        else{
            return redirect(url('/administrador/configuracion.html'))->with('error',$evento);
        }
    }

    public function destroy($id){
        $evento = configuracion::delete($id);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/configuracion.html'))->with('success','configuracion Eliminar');
        }
        else{
            return redirect(url('/administrador/configuracion.html'))->with('error',$evento);
        }
    }
}
