<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\contact_model as contact;

class contactoController extends Controller
{

    /**
     * Guarda mensaje de contacto del usuario.
     *
     * 
     */
    public function index(Request $request){
        $this->validate($request,[
            "nombre" => "string",
            "email" => "email",
            "mensaje" => "required|string",
            "telefono" => "string"
        ]);
        if($request->ajax()){
            if(! \App\Models\front\contact_model::send_message($request))
                abort(500);

        }
        else
            abort(503);
    }

    /**
     * Almacena correos electrónicos para las noticias.
     *
     * 
     */
    public function newsletter(Request $request){

        $response = new \stdClass();

        try{

            $response->email = $request->input('email');

            if( ! filter_var( $response->email, FILTER_VALIDATE_EMAIL ) )
                 throw new \Exception("Ingrese un email válido", 1);
                
            $suscribed = contact::subscribe_newsletter( $response->email );

            if( ! $suscribed )
                throw new \Exception("Ocurrió un error al guardar el registro", 1);

            $response->status   = TRUE;
            $response->message  = "Se ha suscrito correctamente";
            $response->code     = 0;

        }catch( \Exception $e ){

            $response->status   = FALSE;
            $response->message  = $e->getMessage();
            $response->code     = 0;

        }

        print json_encode( $response );
        exit();

    }
   
}
