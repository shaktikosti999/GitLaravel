<?php
namespace App\Models\front;

class pagina_model{

	static function atraccion_random(array $where = null){ //Sección comer y hacer
        $get = \DB::table('atraccion as a')
            ->select(
                'a.id_atraccion as id',
                'ta.nombre as tipo',
                'm.direccion as portada',
                'a.nombre as nombre',
                'a.contenido_extra',
                'a.resumen',
                'a.slug'
            )
            ->join('tipo_atraccion as ta','ta.id_tipo','=','a.tipo_atraccion')
            ->join('multimedia_atraccion as m', function($join){
                $join->on('m.id_atraccion','=','a.id_atraccion')
                    ->where('m.tipo','=',(int)0);
            })
            ->groupBy('m.id_atraccion')
            ->orderByRaw('RAND()');

        if($where !== null){
			foreach($where as $key => $val)
				$get = $get->where($key,$val);
		}
		$get = $get->first();
		if(count($get) > 0)
            return $get;
        return false;
    }

	static function get_attraction(array $where = null, int $limit = null){

		$get = \DB::table('atraccion as a')
			->select(
				'a.id_atraccion',
				'a.nombre',
				'a.resumen',
				'a.descripcion',
				'a.inicio',
				'a.fin',
				'a.slug',
				'l.nombre as lugar',
				'a.contenido_extra',
				'l.latitud',
				'l.longitud',
				'ta.nombre as tipo',
				'ma.direccion as portada'
			)
			->join('lugar as l','l.id_lugar','=','a.id_lugar')
			->join('multimedia_atraccion as ma','ma.id_atraccion','=','a.id_atraccion')
			/*->join('multimedia_atraccion as ma',function($join){
				$join->on('ma.id_atraccion','=','a.id_atraccion')->where('ma.portada','=',1);
			})*/
			->leftJoin('tipo_atraccion as ta','ta.id_tipo','=','a.tipo_atraccion');

		if($where !== null){

			foreach($where as $key => $val)
				$get = $get->orWhere($key,$val);

		}

		if($limit !== null)
			$get = $get->limit($limit);

		$get = $get->get();

		foreach ($get as $value) //Guarda día inicio, día fin y mes
		{ 
			if(isset($value->inicio) and isset($value->fin))
			{
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
	                $mes = pagina_model::mes($mes_inicio);
	                $value->mes = $mes;
	            }
	            else
	            {
	                $mes_inicio = pagina_model::mes($mes_inicio);
	                $mes_fin = pagina_model::mes($mes_fin);
	                $value->mes_inicio = $mes_inicio;
	                $value->mes_fin = $mes_fin;
	            }
	            $value->inicio = $inicio[0];
	            $value->fin = $fin[0];  
			}else{
				$value->mes = '';
				$value->inicio = '';
	            $value->fin = ''; 
			}            
        } 
		return $get;
	}

	static function get_attraction_resaltadas(array $where = null){

		$get = \DB::table('atraccion as a')
			->select(
				'a.id_atraccion',
				'a.nombre',
				'a.resumen',
				'a.descripcion',
				'a.inicio',
				'a.fin',
				'a.slug',
				'a.contenido_extra',
				'l.nombre as lugar',
				'l.latitud',
				'l.longitud',
				'ta.nombre as tipo',
				'ma.direccion as portada'
			)
			->join('lugar as l','l.id_lugar','=','a.id_lugar')
			->join('multimedia_atraccion as ma','ma.id_atraccion','=','a.id_atraccion')
			->leftJoin('tipo_atraccion as ta','ta.id_tipo','=','a.tipo_atraccion');

		if($where !== null){

			foreach($where as $key => $val)
				$get = $get->Where($key,$val);

		}

		$get = $get->get();

		foreach ($get as $value) //Guarda día inicio, día fin y mes
		{ 
			if(isset($value->inicio) and isset($value->fin))
			{
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
	                $mes = pagina_model::mes($mes_inicio);
	                $value->mes = $mes;
	            }
	            else
	            {
	                $mes_inicio = pagina_model::mes($mes_inicio);
	                $mes_fin = pagina_model::mes($mes_fin);
	                $value->mes_inicio = $mes_inicio;
	                $value->mes_fin = $mes_fin;
	            }
	            $value->inicio = $inicio[0];
	            $value->fin = $fin[0];  
			}else{
				$value->mes = '';
				$value->inicio = '';
	            $value->fin = ''; 
			}            
        } 
		return $get;
	}

	static function get_banners(){

		$banners = \DB::table('banner')
			->limit(2)
			->orderByRaw('RAND()')
			->get();

		return $banners;
	}

	static function get_inside_page(int $id = null){
		$get = \DB::table('contenido_simple as cs')
			->select(
				'cs.nombre',
				'cs.slug',
				// 'cs.resumen',
				'cs.imagen_principal'				
			)
			->join('contenido_interno as ci', 'ci.id_interno','=','cs.id_contenido')
			->orderBy('ci.orden');
		if($id !== null)
			$get = $get->where('ci.id_simple',$id);
		$get = $get->get();
		return $get;
	}

	static function get_page($slug){

		$get = \DB::table('contenido_simple')
			->where('slug',$slug)
			->first();

		if(count($get) > 0 )
			return $get;

		return false;
	}

	static function get_sons($id){
		$get = \DB::table('contenido_simple')
			->where('id_padre',$id)
			->get();
		return $get;
	}

	static function hoteles(){ //Sección dormir - Hoteles y marcadores para el mapa
        $tipo_atraccion = \DB::table('tipo_atraccion as t')
            ->select(
                't.id_tipo as id',
                't.nombre as tipo'
            )
            ->where('t.eliminado',0) 
            ->where('t.estatus',1) 
            ->where('t.id_tipo',7) 
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
                'a.contenido_extra',
                'a.slug',
                'l.latitud',
                'l.longitud',
                't.icono'
            )
            ->join('tipo_atraccion as t','t.id_tipo','=','a.tipo_atraccion')
            ->join('lugar as l','l.id_lugar','=','a.id_lugar')
            ->join('multimedia_atraccion as m', function($join){
                $join->on('m.id_atraccion','=','a.id_atraccion')
                    ->where('m.tipo','=',(int)0);
            })
            ->where('a.eliminado',0) 
            ->where('a.estatus',1) 
            ->groupBy('m.id_atraccion')
            ->get();
        $atraccion = array();
        foreach ($tipo_atraccion as $value) { //Guarda las páginas Padres
            $atraccion[$value->id] = (array)$value;             
        }
        foreach ($get as $value) { //Guarda las páginas Hijas
            if ($value->tipo_atraccion != 0 and $value->tipo_atraccion == 7 )
            {
            	if(isset($value->inicio))
                {
                	$fecha_inicio = explode('-',$value->inicio); 
	                $inicio = explode(' ',$fecha_inicio[2]); 

	                $mes_numero = explode('-',$value->inicio); 
	                $mes_inicio = $mes_numero[1];
	                $mes_inicio = index_model::mes($mes_inicio);

	                $value->inicio = $inicio[0];
	                $value->mes = $mes_inicio;
	                $value->anio = $fecha_inicio[0];
	                if($mes_numero[1] == date("m"))
	                {
	                	$atraccion[$value->tipo_atraccion][] = (array)$value;
	                }
	            }
	            else{
	            	$value->inicio = '';
	                $value->mes = '';
	                $value->anio = '';
	            }                 
            }          
        } 
        $marcadores = [];
        foreach($atraccion as $marcador)
        {
	        if(isset($marcador[0]))
	        {
	        	$var = 0;
	            while(isset($marcador[$var]))
	            {
	            	$marcadores[] = (array)$marcador[$var];
	            	$var = $var+1;
	            }
	        }
	    }
        if(count($atraccion) > 0)
            return ['atraccion' => $atraccion, 'marcadores' => $marcadores];
        return false;
    }

	static function marcadores(array $where = null){ // Marcadores para el mapa -> Sección Vino
        $get = \DB::table('atraccion as a')
            ->select(
                'a.id_atraccion as id',
                'ta.id_tipo as id_categoria',              
                'a.nombre as nombre',
                'l.nombre as direccion',
                'l.latitud',
                'l.longitud',
                'ta.icono'
            )
            ->join('tipo_atraccion as ta','ta.id_tipo','=','a.tipo_atraccion')
            ->join('lugar as l','l.id_lugar','=','a.id_lugar')
            ->where('a.eliminado',0) 
            ->where('a.estatus',1);
        if($where !== null){
			foreach($where as $key => $val)
				$get = $get->Where($key,$val);
		}
		$get = $get->get();
        return $get;
    }

	static function menu(){
		$menu=array();
		$get = \DB::table('contenido_simple')
			->select(
				'icon',
				'icon_hover',
				'id_contenido',
				'nombre_span',
				'nombre',
				'slug'
			)
			->where('id_padre',0)
			->where('menu_principal',1)
			->orderBy('orden','ASC')
			->get();

		foreach($get as $val)
			$id[] = $val->id_contenido;

		$son = \DB::table('contenido_simple')
			->select(
				'id_padre as id',
				'nombre_span',
				'icon',
				'nombre',
				'slug'
			)
			->whereIn('id_padre',$id)
			->where('menu_principal',1)
			->orderBy('orden','ASC')
			->get();

		foreach($get as $val)
			$menu[$val->id_contenido]=[
				'nombre_span'=>$val->nombre_span,
				'nombre'=>$val->nombre,
				'slug'=>$val->slug,
				'icon'=>$val->icon,
				'icon_hover'=>$val->icon_hover
			];

		foreach($son as $val)
			$menu[$val->id]['sub'][]=['nombre'=>$val->nombre,'slug'=>$val->slug];

		// dd($menu);

		if(count($menu) > 0)
			return $menu;
		return false;
	}

	static function mes($n_mes){
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

    static function video_random(){
    	$get = \DB::table('video as v')
    		->orderByRaw('RAND()')
    		->first();
    	$data = file_get_contents("http://vimeo.com/api/v2/video/" . $get->direccion . ".json");
	    $data = json_decode($data);
	    $get->imagen = $data[0]->thumbnail_large;
    	return $get;
    }

}