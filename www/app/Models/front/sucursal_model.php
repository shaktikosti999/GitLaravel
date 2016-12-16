<?php
namespace App\Models\front;

class sucursal_model{


    static function find_all($args = []){

        $data = [];

        $data = \DB::table('sucursal as s')
            ->where('s.estatus','=',1)
            ->where('s.eliminado','=',0);
        if(isset($args['id_ciudad']) && !empty($args['id_ciudad']) ){
            $data = $data->where('id_ciudad',$args['id_ciudad']);
        }
            $data = $data->orderBy('s.nombre')
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

    static function get_by_sucursal( $sucursal_slug ){
        $data = \DB::table('sucursal as s')
            ->select(\DB::raw('distinct l.slug as id'),'l.nombre')
            ->join('juego_sucursal as js','s.id_sucursal','=','js.id_sucursal')
            ->join('juego as j','js.id_juego','=','j.id_juego')
            ->join('linea as l','j.id_linea','=','l.id_linea')
            ->where('l.estatus','=',1)
            ->where('l.eliminado','=',0)
            ->where('s.slug','=', $sucursal_slug)
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
        if( $branch !== null ) 
            $branch->galeria = \DB::table('sucursal_galeria as s')
                ->where('s.id_sucursal','=',$branch->id_sucursal)
                ->where('s.estatus','=',1)
                ->where('s.eliminado','=',0)
                ->get();

    }

    static function get_paid($args = []){
        $data = \DB::table('juego_sucursal as js')
            ->select('j.nombre as juego','js.pagado')
            ->join('juego as j','j.id_juego','=','js.id_juego')
            ->join('sucursal as s','s.id_sucursal','=','js.id_sucursal')
            ->where('js.estatus',1)
            ->where('j.estatus',1)
            ->where('s.estatus',1)
            ->where('s.eliminado',0)
            ->where('j.eliminado',0)
            ->where('js.pagado','>',0);
        if( isset($args['id_sucursal']) && !empty($args['id_sucursal']))
            $data = $data->where('js.id_sucursal',$args['id_sucursal']);
        $data = $data->get();
        return $data;
    }

    static function get_sucursal( $sucursal_slug ){
        $data = \DB::table('sucursal as s')
            ->select('s.id_sucursal')            
            ->where('s.slug','=', $sucursal_slug)
            ->get();
        return $data;
    }

}