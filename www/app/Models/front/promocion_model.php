<?php
namespace App\Models\front;

class promocion_model{

    static function find_all( $parameters = [] ){

        $data = [];

        $data = \DB::table('promocion as p')
                        ->orderByRaw('RAND()')
                        ->join('juego as j', 'p.id_juego', '=', 'j.id_juego')
                        ->select("p.*", "j.id_linea")
                        ->where('p.estatus',1)
                        ->where('p.eliminado',0);

        //-----> Aplicamos filtros

        if( isset( $parameters["linea"] ) && ! empty( $parameters["linea"] ) ){

        	$data = $data->where( "j.id_linea", "=", $parameters["linea"] );

        }

        if( isset( $parameters["id_linea"] ) && ! empty( $parameters["id_linea"] ) ){

            $data = $data->where( "j.id_linea", "=", $parameters["id_linea"] );

        }

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) ){

            $data = $data->join("promocion_sucursal as ps", "p.id_promocion", "=", "ps.id_promocion");
            $data = $data->where( "ps.id_sucursal", "=", $parameters["id_sucursal"] );

        }

        $data = $data->get();

        return $data;

    }

    static function find($args = []){
        $get = \DB::table('promocion as p');
        $get = isset($args['slug']) ? $get->where('slug',$args['slug']) : $get;
        $get = $get->first();
        return $get;
    }

}