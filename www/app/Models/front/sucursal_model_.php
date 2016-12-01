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

    static function get_by_city( $city ){
        $data = \DB::table('sucursal as s')
            ->select('s.slug as id','nombre')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0)
            ->where('s.id_ciudad','=', $city)
            ->get();
        return $data;
    }

    static function get_cities($id){
        $get = \DB::table('ciudad AS c')
            ->select(
                'c.id_ciudad AS id',
                'c.nombre'
            )
        ->distinct()
        ->join('sucursal AS s','s.id_ciudad','=','c.id_ciudad')
        ->join('juego_sucursal AS js','js.id_sucursal','=','s.id_sucursal')
        ->join('juego AS j','j.id_juego','=','js.id_juego')
        ->where('j.id_linea','=',$id)
        ->get();
        return $get;
    }

    static function get_gallery($id){
        $get = \DB::table('sucursal_galeria as s')
            ->where('id_sucursal',$id)
            ->where('estatus',1)
            ->where('eliminado',0)
            ->get();
        return $get;
    }

    static function get_branch_gallery( & $branch ){

        $branch->galeria = \DB::table('sucursal_galeria as s')
			                        ->where('s.id_sucursal','=',$branch->id_sucursal)
			                        ->where('s.estatus','=',1)
			                        ->where('s.eliminado','=',0)
			                        ->get();
    }

}