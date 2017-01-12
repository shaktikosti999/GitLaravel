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
            'contactos' => contacto::all(),
            'mails' =>contacto::mails()
        );
        return view('back.contacto.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if( $request->input('mail_own') !== null && trim($request->input('mail_own')) != "" ){
            $data = [
                'mail' => trim($request->input('mail_own')),
                'tipo_mail' => 1
            ];
            \DB::table('mail_aviso')->insert($data);
        }
        if( $request->input('borrar_own') !== null && count($request->input('borrar_own')) ){
            $data = \DB::table('mail_aviso');
            foreach($request->input('borrar_own') as $borrar ){
                $data = $data->where('id',$borrar);
            }
            $data = $data->delete();
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $error_msg = [
            'field-name.required' => 'Debe de escribir un nombre',
            'field-name.min' => 'El nombre debe de contener por lo menos 2 caracteres',
            'field-name.max' => 'El nombre debe de tener máximo 100 caracteres',

            'field-email.required' => 'Debe de escribir un email',
            'field-email.email' => 'Debe de escribir un email válido',

            'field-card.required' => 'Debe de escribir su número de tarjeta',

            'field-tipo.required' => 'Falta el tipo de mensaje',
            'field-tipo.integer' => 'Tipo demensaje no válido',
            'field-tipo.min' => 'Tipo demensaje no válido',
            'field-tipo.max' => 'Tipo demensaje no válido',
        ];
        $validate = \Validator::make($request->all(),[
            "field-name" => "required|min:2|max:100",
            "field-email" => "required|email",
            "field-phone" => "string",
            "field-card" => "required|string",
            "field-tipo" => "required|integer|min:1|max:4",
            "field-sucursal" => "integer",
            "field-message" => "string",
            "field-promo" => "integer"
        ],$error_msg);

        if( $validate->fails())
            return redirect()->back()->withErrors($validate);

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
