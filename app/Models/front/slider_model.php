<?php
namespace App\Models\front;

class slider_model{

    static function find_all($tipo = 1){

        $getdata = [];

        $getdata = \DB::table('slider as s')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.tipo',$tipo)
            ->orderByRaw('RAND()')
            ->get();

        $data = [];
        foreach($getdata as $d){
            if($d->is_show_title==0){
                $d->titulo="";
            }

            array_push($data,$d);
        }
//        dd($data);
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