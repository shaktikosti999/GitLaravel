<?php
namespace App\Models\front;

class slider_model{

    static function find_all($tipo = 1){

        $data = [];

        $data = \DB::table('slider as s')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.tipo',$tipo)
            ->orderByRaw('RAND()')
            ->get();

        return $data;

    }

    static function football_pools(){
    	$data = \DB::table('slider as s')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.tipo',0)
            ->orderByRaw('RAND()')
            ->get();
        return $data;
    }

}