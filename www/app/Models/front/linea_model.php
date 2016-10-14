<?php
namespace App\Models\front;

class linea_model{

	static function find_all( $parameters = [] ){
		
        $data = \DB::table('linea as l')
            			->select(
                            'l.nombre as linea',
                            'l.icono',
                            'l.slogan',
                            'l.imagen',
            				'l.slug'
            			)
                        ->where('l.estatus','=',1)
                        ->where('l.eliminado','=',0);

        //-----> Aplicamos filtros

        if( isset( $parameters["not_in"] ) && count( $parameters["not_in"] ) ){

            $data = $data->whereNotIn( 'id_linea', $parameters["not_in"] );

        }

        $data = $data->get();

		return $data;

	}

    static function find_gallery( $id_linea ){

        if( ! $id_linea )
            throw new Exception("Ingrese un id de linea correcto", 1);
            
        
        $data = \DB::table('linea_galeria as lg')
                        ->select(
                            'lg.imagen'
                        )
                        ->where('lg.id_linea','=',$id_linea)
                        ->get();

        return $data;

    }

    static function find_all_games( $parameters = [] ){
        
        $data = \DB::table('juego as j')
                        ->select(
                            'j.nombre as juego',
                            'j.imagen',
                            'j.resumen'
                        )
                        ->where('j.estatus','=',1)
                        ->where('j.eliminado','=',0);

        //-----> Aplicamos filtros

        if( isset( $parameters["linea"] ) && ! empty( $parameters["linea"] ) ){

            $data = $data->where( "j.id_linea", "=", $parameters["linea"] );

        }

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) ){

            $data = $data->join("juego_sucursal as js", "j.id_juego", "=", "js.id_juego");
            $data = $data->where( "js.id_sucursal", "=", $parameters["id_sucursal"] );

        }

        $data = $data->get();


        return $data;

    }


    static function find_all_providers( $parameters = [] ){
        
        $data = \DB::table('proveedor as p')
                        ->select(
                            'p.nombre',
                            'p.archivo',
                            'p.link'
                        )
                        ->where('p.estatus','=',1)
                        ->where('p.eliminado','=',0);

        $data = $data->get();


        return $data;

    }

    
}