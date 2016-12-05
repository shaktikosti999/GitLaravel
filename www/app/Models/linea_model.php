<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\linea;
class linea_model{
	static function all(){
		$sucursal = \DB::table('linea as l')
			->select(
				'id_linea as id',
				'nombre',
				'slogan',
				'slug',
				'estatus',
				\DB::raw('IF(g.cantidad IS NULL,0,g.cantidad) as galeria')
			)
			->where('eliminado',0)
			->leftJoin('count_gallery_line_view as g', 'g.id','=','l.id_linea')
			// ->where('l.eliminado',0)
			->get();
		return $sucursal;
	}

	static function get_game_lines(){
		$lineas = \DB::table('linea')
			->select('nombre','id_linea as id')
			->orderBy('nombre')
			->get();
		return $lineas;
	}

	static function find($id){
		return linea::find($id);
	}

	static function store($request,$archivo){
		$linea = new linea;
		$linea->nombre = $request->input('nombre');
		$linea->slug = $request->input('slug');
		$linea->slogan = $request->input('slogan');
		$linea->icono = $request->input('icono');
		$linea->imagen = $archivo;
		$evento = Event::fire(new dotask($linea));
		return $evento;
	}

	static function update($id, $request,$archivo = false){
		$linea = linea::find($id);
		$linea->nombre = $request->nombre;
		$linea->slug = $request->input('slug');
		$linea->slogan = $request->input('slogan');
		$linea->icono = $request->input('icono');
		if($archivo !== false && is_file(getcwd() . $linea->imagen)){
			unlink(getcwd() . $linea->imagen);
			$linea->imagen = $archivo;
		}
		$evento = Event::fire(new dotask($linea));
		return $evento;
	}
};
