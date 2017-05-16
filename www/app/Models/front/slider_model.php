<?php
namespace App\Models\front;

class slider_model{

    static function find_all($tipo = 1, $id_sucursal = null){

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
            }else{
                if($d->link!="") {
                    $d->titulo = '&lt;a href=&quot;' . $d->link . '&quot;&gt;' . $d->titulo . '&lt;/a&gt;';
                }
            }

            array_push($data,$d);
        }
//        dd($data);
        return $data;

        $data = [];

        $data = \DB::table('promocion as p')
            ->orderByRaw('RAND()')
            ->join('linea as l', 'p.id_juego', '=', 'l.id_linea')
            ->select("p.*", "l.id_linea")
            ->where('p.estatus',1)
            ->where('p.eliminado',0);

        //-----> Aplicamos filtros

        if( isset( $parameters["linea"] ) && ! empty( $parameters["linea"] ) ){

            $data = $data->where( "l.id_linea", "=", $parameters["linea"] );

        }

        if( isset( $parameters["id_linea"] ) && ! empty( $parameters["id_linea"] ) ){

            $data = $data->where( "l.id_linea", "=", $parameters["id_linea"] );

        }

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) ){

            $data = $data->select("p.*", "l.id_linea","ps.*")
                ->join("promocion_sucursal as ps", "p.id_promocion", "=", "ps.id_promocion");
            $data = $data->where( "ps.id_sucursal", "=", $parameters["id_sucursal"] );

        }

        $data = $data->groupBy('branch_group_id')
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