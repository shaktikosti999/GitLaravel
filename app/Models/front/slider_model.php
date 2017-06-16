<?php
namespace App\Models\front;

class slider_model{

    static function find_all($arg = []){

        $getdata = [];

        $getdata = \DB::table('slider as s')
            ->select("s.*")
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.tipo','=',$arg['tipo'])
            ->orderByRaw('RAND()');

        if( isset( $arg['id_sucursal']) && ! empty($arg['id_sucursal']) ){
             $getdata->join("slider_sucursal as ss", "s.id", "=", "ss.id_slider")
                        ->where( "ss.id_sucursal", "=", $arg['id_sucursal']);
        } else {
            $getdata->where( "isParentShow", "=", 1);
        }

        $getdata = $getdata->groupby('branch_group_id')
        ->get();

        $data = [];
        foreach($getdata as $d){
            if($d->is_show_title==0){
                $d->titulo="";
            }

            if($d->is_btn_active==0 || $d->texto_boton == ""){
                $d->texto_boton=null;
            }
            array_push($data,$d);
        }

        //dd($data);
        return $data;

    }

    static function football_pools(){
    	$data = \DB::table('slider as s')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.tipo',11)
            ->orderByRaw('RAND()')
            ->get();

        return $data;
    }

}