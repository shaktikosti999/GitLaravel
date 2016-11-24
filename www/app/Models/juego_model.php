<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\juego;
use Illuminate\Support\Str;

class juego_model{
	static function all($args = []){
		$sucursal = \DB::table('juego as j')
			->select(
				'j.id_juego as id',
				'j.nombre',
				'j.titulo',
				'j.estatus',
				'l.nombre as linea'
			)
			->join('linea as l','l.id_linea','=','j.id_linea')
			->where('j.eliminado',0);
			// ->where('l.eliminado',0)
			if( isset($args['id_linea']) )
				$sucursal = $sucursal->where('j.id_linea',$args['id_linea']);
			$sucursal = $sucursal->get();
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
		return juego::find($id);
	}

	static function list_games(){
		$get = \DB::table('juego')
			->select('id_juego as id', 'nombre')
			->get();
		return $get;
	}

	static function store($request){
		$sucursal = new juego;
		$sucursal->id_linea = $request->linea;
		$sucursal->id_categoria = $request->categoria == 'null' ? null : $request->categoria;
		$sucursal->nombre = $request->nombre;
		$sucursal->titulo = $request->titulo;
		$sucursal->resumen = $request->resumen;
		$sucursal->aprender = $request->aprender;
		$sucursal->reglas = $request->reglas;
		$sucursal->slug = Str::slug($request->nombre, '-');
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}

	static function update($id, $request){
		$sucursal = juego::find($id);
		$sucursal->id_linea = $request->linea;
		$sucursal->id_categoria = $request->categoria == 'null' ? null : $request->categoria;
		$sucursal->nombre = $request->nombre;
		$sucursal->titulo = $request->titulo;
		$sucursal->resumen = $request->resumen;
		$sucursal->aprender = $request->aprender;
		$sucursal->reglas = $request->reglas;
		$sucursal->slug = Str::slug($request->nombre, '-');
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}
};
