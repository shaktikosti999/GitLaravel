<?php
namespace App\Models\front;

class linea_model{

    static function accumulated( $args = [] ){
        $get  = \DB::table('juego_sucursal as js');
        if( array_key_exists('linea', $args) && $args['linea'] !== null ){
            $get = $get->join('juego as j','j.id_juego','=','js.id_juego')
                ->where('j.id_linea',$args['linea']);
        }
        if( array_key_exists('id_sucursal', $args) && $args['id_sucursal'] !== null )
            $get = $get->where('id_sucursal',$args['id_sucursal']);
        $get = $get->sum('acumulado');
        return $get;
    }

	static function find_all( $parameters = [] ){
		
        $data = \DB::table('linea as l')
            			->select(
                            'l.id_linea',
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

            $data = $data->orderByRaw("RAND()")
                ->whereNotIn( 'id_linea', $parameters["not_in"] );

        }

        $data = $data->get();

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

    static function find_all_tournaments( $parameters = [] ){
        
        $data = \DB::table('torneo as t')
            ->select(
                't.titulo',
                't.slug',
                't.fecha_inicio',
                't.fecha_fin',
                't.archivo',
                't.link',
                's.nombre as sucursal',
                'tt.nombre as tipo'
            )
            ->where('t.estatus','=',1)
            ->where('t.eliminado','=',0)
            ->where('s.estatus',1)
            ->where('s.eliminado',0)
            ->where('t.tipo_torneo','!=',999)
            ->join("tipo_torneo as tt", "t.tipo_torneo", "=", "tt.id_tipo")
            ->join("sucursal as s", "t.id_sucursal", "=", "s.id_sucursal");

        //-----> Aplicamos filtros

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) )
            $data = $data->where( "s.id_sucursal", "=", $parameters["id_sucursal"] );

        if( isset($parameters['id_juego'] )&& ! empty( $parameters["id_juego"] ) ){
            $data->join('juego as j','j.id_juego','=','t.id_juego')
                ->where('j.id_juego',$parameters['id_juego']);
        }

        $data = $data
            ->where('fecha_inicio','>',date('Y-m-d'))
            ->orderBy('fecha_inicio')
            // ->paginate(2);
            ->get();

        // dd($data);
        return $data;
    }

    static function find_all_event( $parameters = [] ){
        
        $data = \DB::table('torneo as t')
            ->select(
                't.titulo',
                't.slug',
                't.fecha_inicio',
                't.fecha_fin',
                't.archivo',
                't.link',
                's.nombre as sucursal',
                'tt.nombre as tipo'
            )
            ->where('t.estatus','=',1)
            ->where('t.eliminado','=',0)
            ->where('t.tipo_torneo',999)
            ->where('s.estatus',1)
            ->where('s.eliminado',0)
            ->join("tipo_torneo as tt", "t.tipo_torneo", "=", "tt.id_tipo")
            ->join("sucursal as s", "t.id_sucursal", "=", "s.id_sucursal");

        //-----> Aplicamos filtros

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) )
            $data = $data->where( "s.id_sucursal", "=", $parameters["id_sucursal"] );

        if( isset($parameters['id_juego'] )&& ! empty( $parameters["id_juego"] ) ){
            $data->join('juego as j','j.id_juego','=','t.id_juego')
                ->where('j.id_juego',$parameters['id_juego']);
        }

        $data = $data
            ->where('fecha_inicio','>=',date('Y-m-d'))
            // ->where('fecha_fin','<=',date('Y-m-d'))
            ->orderBy('fecha_inicio')
            // ->paginate(2);
            ->get();

        // dd($data);
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

    static function get_categories($args = []){
        $data = \DB::table('categoria_juego as cj')
            ->select(
                'cj.id',
                'cj.nombre'
            );
        if( isset($args['del']) ){
            $data = $data
                ->leftJoin('juego as j','j.id_categoria','=','cj.id')
                ->where('j.id_categoria',NULL);
        }
        if( isset($args['list']) ){
            $data = $data
                ->distinct()
                ->join('juego as j','j.id_categoria','=','cj.id');
        }
        $data = $data->get();
        return $data;
    }

    static function get_games($args = []){
        $get = \DB::table('juego as j')
            ->select(
                'j.id_juego as id',
                'j.nombre',
                'j.titulo',
                'j.imagen',
                'j.resumen',
                'j.thumb',
                'j.slug',
                'js.link',
                'js.archivo',
                'js.acumulado',
                'js.apuesta_minima',
                'js.descripcion',
                'js.disponibles'
            )
            ->leftjoin('juego_sucursal AS js','js.id_juego','=','j.id_juego')
            ->where('j.estatus',1)
            ->where('j.eliminado',0);
        if(array_key_exists('linea', $args) && $args['linea'] !== null)
            $get = $get->where('j.id_linea',$args['linea']);
        if(array_key_exists('id_sucursal', $args) && $args['id_sucursal'] !== null)
            $get = $get->where('js.id_sucursal',$args['id_sucursal']);
        if(array_key_exists('id_categoria', $args) && $args['id_categoria'] !== null)
            $get = $get->where('j.id_categoria',$args['id_categoria']);
        if(array_key_exists('limit', $args) && $args['limit'] !== null)
            $get = $get->limit($args['limit']);
        if(array_key_exists('not_id', $args) && $args['not_id'] !== null)
            $get = $get->whereNotIn('j.id_juego',$args['not_id']);
        if(array_key_exists('id', $args) && $args['id'] !== null)
            $get = $get->where('j.id_juego',$args['id']); 
        $get = $get->get();
        return $get;
    }

    static function get_games_table($args = []){
        $get = \DB::table('juego as j')
            ->select(
                'j.id_juego as id',
                'j.nombre',
                'j.titulo',
                'j.imagen',
                'j.resumen',
                // 'js.archivo',
                'j.thumb',
                'j.slug'
                // 'js.link',
                // 'js.archivo',
                // 'js.acumulado',
                // 'js.apuesta_minima',
                // 'js.descripcion',
                // 'js.disponibles'
            )
            ->where('j.estatus',1)
            ->where('j.eliminado',0);
        if(array_key_exists('linea', $args) && $args['linea'] !== null)
            $get = $get->where('j.id_linea',$args['linea']);
        if(array_key_exists('id_sucursal', $args) && $args['id_sucursal'] !== null){
            $get = $get
                ->select(
                    'j.id_juego as id',
                    'js.id_sucursal',
                    'j.nombre',
                    'j.titulo',
                    'j.imagen',
                    'j.resumen',
                    'js.archivo',
                    'j.thumb',
                    'j.slug',
                    'js.link',
                    'js.archivo',
                    // 'js.acumulado',
                    'js.apuesta_minima',
                    // 'js.descripcion',
                    'js.disponibles'
                )
                ->where('js.id_sucursal',$args['id_sucursal'])
                ->join('juego_sucursal AS js','js.id_juego','=','j.id_juego');
        }
        if(array_key_exists('id_categoria', $args) && $args['id_categoria'] !== null)
            $get = $get->where('j.id_categoria',$args['id_categoria']);
        if(array_key_exists('limit', $args) && $args['limit'] !== null)
            $get = $get->limit($args['limit']);
        if(array_key_exists('not_id', $args) && $args['not_id'] !== null)
            $get = $get->whereNotIn('j.id_juego',$args['not_id']);
        if(array_key_exists('id', $args) && $args['id'] !== null)
            $get = $get->where('j.id_juego',$args['id']); 
        $get = $get->get();
        return $get;
    }

    static function get_programs($args = [] ){
        $data = \DB::table('carrerapdf as c')
            ->distinct()
            ->select(
                'c.titulo',
                'c.fecha',
                'j.nombre',
                'c.archivo',
                'j.imagen'
            )
            ->join('carrera_sucursal as cs','cs.id_carrera','=','c.id_carrerapdf')
            ->join('juego as j','j.id_juego','=','c.id_juego');
        if( isset($args['id_sucursal']) )
            $data = $data->where('cs.id_sucursal',$args['id_sucursal']);
        if( isset($args['id_juego']) )
            $data = $data->where('j.id_juego',$args['id_juego']);
        $data = $data
            ->where('c.estatus',1)
            ->where('c.eliminado',0)
            ->get();
        foreach($data as $key => $item){
            if( !is_file( public_path() . $item->archivo) )
                $data[$key]->archivo = "";
        }
        // dd($data);
        return $data;
    }

    static function get_races($args = []){
        $data = \DB::table('juego as j')
            ->select(
                'js.archivo',
                'j.nombre as titulo',
                'j.slug'
            )
            ->leftJoin('juego_sucursal as js','js.id_juego','=','j.id_juego')
            ->where('id_linea',4)
            ->get();
        return $data;
    }

    static function tables_availability(){
        if($args['id_sucursal']){}
        else{}
    }

}