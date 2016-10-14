<?php
namespace App\Models\front;
use App\contacto;
use App\newsletter;

class contact_model{

    static function subscribe_newsletter( $email ){

        $store = new newsletter;



        $store->telefono    = 0;
        $store->nombre      = "-";
        $store->mail        = $email;

        return $store->save();

    }

    static function all(){
        $get = \DB::table('contacto')
            ->where('eliminado',0)
            ->orderBy('created_at')
            ->get();
        return $get;
    }

    /**
    ** Obtener el mensaje de contacto
    **/

    static function get_message($id){
        $get = \DB::table('contacto')->select('mensaje')->where('id_contacto',$id)->first();
        return $get->mensaje;
    }

    /**
        ** Guardar mensaje de contacto
    **/
    static function send_message($request){
        $mensaje = new contacto;
        $mensaje->nombre = trim($request->input('nombre')) != "" ? trim($request->input('nombre')) : "";
        $mensaje->email = trim($request->input('email')) != "" ? trim($request->input('email')) : "";
        $mensaje->telefono = trim($request->input('mensaje'));
        $mensaje->mensaje = trim($request->input('telefono')) != "" ? trim($request->input('telefono')) : "";
        return $mensaje->save();
    }	
}