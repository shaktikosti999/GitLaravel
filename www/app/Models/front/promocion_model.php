<?php
namespace App\Models\front;

class promocion_model{

    static function find_all( $parameters = [] ){

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

    static function find_valid_branch($id){
        $data = \DB::table('sucursal as s')
            ->select('s.nombre','s.slug','s.id_sucursal as id')
            ->join('promocion_sucursal as sp','sp.id_sucursal','=','s.id_sucursal')
            ->where('sp.id_promocion',$id)
            ->get();
        return $data;
    }

    static function get_dynamic($id){
        $data = \DB::table('pago_promocion as pp')->where('pp.id_promocion',$id)->get();
        return $data;
    }

}