<?php
namespace App\Models\front;

class sucursal_model{

    static function find_all(){

        $data = [];

        $data = \DB::table('sucursal as s')
                        ->where('s.estatus','=',1)
                        ->where('s.eliminado','=',0)
                        ->orderBy('s.nombre')
                        ->get();

        //-----> Obtenemos la galeria de la sucursal
        //self::get_branch_gallery( $data );

        return $data;

    }

    static function find_by_slug( $slug = null ){

        if( ! $slug )
            return FALSE;

        $data = [];

        $data = \DB::table('sucursal as s')
                        ->where('s.estatus','=',1)
                        ->where('s.eliminado','=',0)
                        ->where('s.slug','=', $slug)
                        ->first();

        //-----> Obtenemos la galeria de la sucursal
        self::get_branch_gallery( $data );

        return $data;

    }

    static function find_random(){

        $data = [];

        $data = \DB::table('sucursal as s')
                        ->where('s.estatus','=',1)
                        ->where('s.eliminado','=',0)
                        ->orderByRaw('RAND()')
                        ->first();

        //-----> Obtenemos la galeria de la sucursal
        self::get_branch_gallery( $data );

        return $data;

    }

    static function get_branch_gallery( & $branch ){

        $branch->galeria = \DB::table('sucursal_galeria as s')
			                        ->where('s.id_sucursal','=',$branch->id_sucursal)
			                        ->where('s.estatus','=',1)
			                        ->where('s.eliminado','=',0)
			                        ->get();

    }

}