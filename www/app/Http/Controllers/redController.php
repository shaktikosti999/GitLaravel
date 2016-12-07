<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\red_social_model as red;
use \App\Models\sucursal_model as sucursal;

class redController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'redes' => red::all()
        );

        // dd($data);

        return view('back.redsoc.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = array(
            'redes' => red::social_networks(),
            // 'sucursales' => sucursal::all()
        );
        // dd($data);

        return view('back.redsoc.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'red' => 'required|integer|min:1',
            'texto' => 'required|string',
            'url' => 'required|string',
        ]);
        $evento = red::store($request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/red.html'))->with('success','Red Social agregada correctamente');
        }
        else{
            return redirect(url('/administrador/red.html'))->with('error',$evento);
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
            'redes' => red::social_networks(),
            'red' => red::find($id),
            'id' => $id
        );
        return view('back.redsoc.edit',$data);
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
            'red' => 'required|integer|min:1',
            'texto' => 'required|string',
            'url' => 'required|string',
        ]);
        $evento = red::update($request, $id);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/red.html'))->with('success','Red Social modificada correctamente');
        }
        else{
            return redirect(url('/administrador/red.html'))->with('error',$evento);
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
