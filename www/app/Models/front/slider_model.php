<?php
namespace App\Models\front;

class slider_model{

    static function find_all(){

        $data = [];

        $data = \DB::table('slider as s')
                        ->where('s.estatus','=',1)
                        ->where('s.eliminado','=',0)
                        ->orderByRaw('RAND()')
                        ->get();

        return $data;

    }

}