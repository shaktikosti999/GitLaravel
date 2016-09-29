<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\linea;
class linea{
	static function all(){
		$sucursal = \DB::table('linea')
			->select(
				'id_linea as id',
				'nombre',
				'estatus'
			)
			->where('eliminado',0)
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
		$linea->nombre = $request->nombre;
		$linea->archivo = $archivo;
		$evento = Event::fire(new dotask($linea));
		return $evento;
	}

	static function update($id, $request,$archivo = false){
		$linea = linea::find($id);
		$linea->nombre = $request->nombre;
		if($archivo !== false && is_file(getcwd() . $linea->archivo)){
			unlink(getcwd() . $linea->archivo);
			$linea->archivo = $archivo;
		}
		$evento = Event::fire(new dotask($linea));
		return $evento;
	}
};
