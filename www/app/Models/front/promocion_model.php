<?php
namespace App\Models\front;

class promocion_model{

    static function find_all( $parameters = [] ){

        $data = [];

        $data = \DB::table('promocion as p')
                        ->orderByRaw('RAND()')
                        ->join('juego as j', 'p.id_juego', '=', 'j.id_juego')
                        ->select("p.*");

        //-----> Aplicamos filtros

        if( isset( $parameters["linea"] ) && ! empty( $parameters["linea"] ) ){

        	$data = $data->where( "j.id_linea", "=", $parameters["linea"] );

        }

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) ){

            $data = $data->join("promocion_sucursal as ps", "p.id_promocion", "=", "ps.id_promocion");
            $data = $data->where( "ps.id_sucursal", "=", $parameters["id_sucursal"] );

        }

        $data = $data->get();

        return $data;

    }

}