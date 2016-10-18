<?php
namespace App\Models\front;

class alimento_model{
    
    static function find_all(){

        //-----> Obtenemos las categorias
        

    }

	static function featured_activities(){
		$get = \DB::table('atraccion as a')
			->select(
				'a.id_atraccion as id',
				't.nombre as tipo',
				'm.direccion as imagen',
				'a.nombre as nombre',
				'a.resumen',
                'a.slug'
			)
			->join('tipo_atraccion as t','t.id_tipo','=','a.tipo_atraccion')
			->join('multimedia_atraccion as m', function($join){
				$join->on('m.id_atraccion','=','a.id_atraccion')
					->where('m.tipo','=',(int)0);
			})
            ->where('a.destacado','=',1)
			->groupBy('m.id_atraccion')
			// ->limit(3)
			->get();
		if(count($get) > 0)
			return $get;
		return false;
	}

    static function otras_actividades(){
        $tipo_atraccion = \DB::table('tipo_atraccion as t')
            ->select(
                't.id_tipo as id',
                't.nombre as tipo'
            )
            ->where('t.eliminado',0) 
            ->where('t.estatus',1) 
            ->where('t.nombre','Eventos, fiestas y festivales') 
            ->groupBy('t.id_tipo')
            ->get();

        $get = \DB::table('atraccion as a')
            ->select(
                'a.id_atraccion as id',
                't.id_tipo as tipo_atraccion',
                't.nombre as atraccion',
                'm.direccion as imagen',
                'a.nombre as nombre',
                'a.resumen',
                'a.inicio',
                'a.fin',
                'l.nombre as lugar',
                'a.slug'
            )
            ->join('tipo_atraccion as t','t.id_tipo','=','a.tipo_atraccion')
            ->join('lugar as l','l.id_lugar','=','a.id_lugar')
            ->join('multimedia_atraccion as m', function($join){
                $join->on('m.id_atraccion','=','a.id_atraccion')
                    ->where('m.tipo','=',(int)0);
            })
            ->where('a.destacado','=',0)
            ->where('a.eliminado',0) 
            ->where('a.estatus',1) 
            ->groupBy('m.id_atraccion')
            ->get();
        $atraccion = array();
        foreach ($tipo_atraccion as $value) { //Guarda las páginas Padres
            $atraccion[$value->id] = (array)$value;             
        }
        foreach ($get as $value) { //Guarda las páginas Hijas
            if ($value->tipo_atraccion != 0 and $value->atraccion == 'Eventos, fiestas y festivales' ) {

                $inicio = explode('-',$value->inicio); 
                $inicio = explode(' ',$inicio[2]); 
                $fin = explode('-',$value->fin); 
                $fin = explode(' ',$fin[2]);

                $mes_inicio = explode('-',$value->inicio); 
                $mes_inicio = $mes_inicio[1];
                $mes_fin = explode('-',$value->fin); 
                $mes_fin = $mes_fin[1];

                if($mes_inicio==$mes_fin)
                {
                    $mes = index_model::mes($mes_inicio);
                    $value->mes = $mes;
                }
                else
                {
                    $mes_inicio = index_model::mes($mes_inicio);
                    $mes_fin = index_model::mes($mes_fin);
                    $value->mes_inicio = $mes_inicio;
                    $value->mes_fin = $mes_fin;
                }
                $value->inicio = $inicio[0];
                $value->fin = $fin[0];
                $atraccion[$value->tipo_atraccion][] = (array)$value; 
            }          
        } 
        if(count($atraccion) > 0)
            return $atraccion;
        return false;
    }   

    static function mes($n_mes)
    {
        switch($n_mes)
        {
            case '01': 
                $mes = 'enero';
                break;
            case '02': 
                $mes = 'febrero';
                break;
            case '03': 
                $mes = 'marzo';
                break;
            case '04': 
                $mes = 'abril';
                break;
            case '05': 
                $mes = 'mayo';
                break;
            case '06': 
                $mes = 'junio';
                break;
            case '07': 
                $mes = 'julio';
                break;
            case '08': 
                $mes = 'agosto';
                break;
            case '09': 
                $mes = 'septiembre';
                break;
            case '10': 
                $mes = 'octubre';
                break;
            case '11': 
                $mes = 'noviembre';
                break;
            case '12': 
                $mes = 'diciembre';
                break;
            default: 
                $mes = '';                                  
        }
        return $mes;
    } 

	static function paginas_simples(){
		$paginas_simples = \DB::table('contenido_simple as padre')
            ->select(
                'padre.id_contenido as id',
                'padre.estatus',
                'padre.link',
                'padre.contenido',
                'padre.contenido_extra',
                'hijo.nombre as hijo',
                'padre.nombre as titulo_padre',
                'padre.id_padre',
                'padre.menu_principal as menu_principal',
                'padre.menu_inferior as menu_inferior',
                'padre.slug',
                'padre.imagen_principal as imagen'               
            )
            ->leftjoin('contenido_simple as hijo','padre.id_contenido','=','hijo.id_padre')
            ->where('padre.eliminado',0)    
            ->where('padre.estatus',1)             
            ->orderBy('padre.orden','ASC')
            ->get();
        $pagina = array();
        foreach ($paginas_simples as $value) { //Guarda las páginas Padres
            if ($value->id_padre == 0) {                
               $pagina[$value->id] = (array)$value;  
            }            
        }
        foreach ($paginas_simples as $value) { //Guarda las páginas Hijas
            if ($value->id_padre != 0) {
                $pagina[$value->id_padre][] = (array)$value; 
            }          
        }        
		return $pagina;
	}

    static function paginas_destacadas()
    {
        $paginas_destacadas = \DB::table('contenido_simple as hijo')
            ->select(
                'hijo.id_contenido as id',
                'hijo.link',
                'hijo.contenido',
                'hijo.nombre',
                'hijo.imagen_principal as imagen',
                \DB::raw('CONCAT(padre.slug,"/",hijo.slug) as slug')
            )
            ->where('hijo.eliminado',0)    
            ->where('hijo.estatus',1)      
            ->where('hijo.destacado',1)       
            ->orderBy('hijo.orden','ASC')
            ->leftjoin('contenido_simple as padre','padre.id_contenido','=','hijo.id_padre')
            ->get();     
        return $paginas_destacadas;
    }

    static function videos_destacados()
    {
        $videos_destacados = \DB::table('video as v')
            ->select(
                'v.id_video as id',
                'v.nombre',
                'v.direccion',
                'v.tipo_video',
                'v.descripcion'             
            )
            ->where('v.eliminado',0)    
            ->where('v.estatus',1)      
            ->where('v.destacado',1)          
            ->orderBy('v.orden','ASC')
            ->get();     
        return $videos_destacados;
    }

    static function atraccion_random(){
        $get = \DB::table('atraccion as a')
            ->select(
                'a.id_atraccion as id',
                't.nombre as tipo',
                'm.direccion as imagen',
                'a.nombre as nombre',
                'a.resumen',
                'a.slug'
            )
            ->join('tipo_atraccion as t','t.id_tipo','=','a.tipo_atraccion')
            ->join('multimedia_atraccion as m', function($join){
                $join->on('m.id_atraccion','=','a.id_atraccion')
                    ->where('m.tipo','=',(int)0);
            })
            ->where('a.destacado','=',1)
            ->groupBy('m.id_atraccion')
            ->orderByRaw('RAND()')
            ->first();
        if(count($get) > 0)
            return $get;
        return false;
    }

    static function categorias(){
        $get = \DB::table('tipo_atraccion as c')
            ->select(
                'c.id_tipo as id',
                'c.nombre',
                'c.icono'
            )
            ->join('atraccion as a','c.id_tipo','=','a.tipo_atraccion')
            ->where('c.estatus','=',1)
            ->where('c.eliminado','=',0)
            ->orderBy('c.nombre','ASC')
            ->groupBy('c.id_tipo')
            ->get();
        if(count($get) > 0)
            return $get;
        return false;
    }

    static function marcadores(){
        $get = \DB::table('atraccion as a')
            ->select(
                'a.id_atraccion as id',
                't.id_tipo as id_categoria',              
                'a.nombre as nombre',
                'l.nombre as direccion',
                'l.latitud',
                'l.longitud',
                't.icono'
            )
            ->join('tipo_atraccion as t','t.id_tipo','=','a.tipo_atraccion')
            ->join('lugar as l','l.id_lugar','=','a.id_lugar')
            ->where('a.eliminado',0) 
            ->where('a.estatus',1) 
            ->get();
        if(count($get) > 0)
            return $get;
        return false;
    }
}