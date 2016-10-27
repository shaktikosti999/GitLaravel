<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\contacto_model as contacto;

class contactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'contactos' => contacto::all()
        );
        return view('back.contacto.index',$data);
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
    public function store(Request $request){
        $this->validate($request,[
            "field-name" => "required|min:2|max:100",
            "field-email" => "required|E-Mail",
            "field-phone" => "string",
            "field-card" => "required|string",
            "field-tipo" => "required|integer|min:1|max:4",
            "field-sucursal" => "integer",
            "field-message" => "string",
            "field-promo" => "integer"
        ]);

        // $request->input('field-promo') = isset($request->input('field-promo')) && $request->input('field-promo') != 0 ? 1 : 0;

        if(contacto::store($request))
            return redirect()->back()->with('success','Gracias por estar en contacto con nosotros');
        return redirect()->back()->with('success','Ocurrió un evento inesperado, inténtelo de nuevo más tarde');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if( \Request::ajax() )
            echo contacto::find_message($id);
        else
            abort(500);
    }

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
