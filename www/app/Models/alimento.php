<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\alimento;
class alimento{
	static function all(){
		$alimento = \DB::table('alimento as a')
			->select('a.id_alimento as id','a.nombre as nombre','ta.nombre as tipo','a.estatus')
			->join('tipo_alimento as ta','ta.id_tipo','=','a.tipo_alimento')
			->orderBy('ta.nombre')
			->orderBy('a.nombre')
			// ->where('a.estatus',1)
			->where('a.eliminado',0)
			->get();
		return $alimento;
	}

	static function find($id){
		return alimento::find($id);
	}

	static function get_file_name($id){
		$file = \DB::table('alimento as a')
			->select('archivo')
			->where('id_alimento',$id)
			->first();
		if( $file !== null ){
			$file = $file->archivo;
			return $file;
		}
		return false;
	}

	static function get_food_type(){
		$ft = \DB::table('tipo_alimento as ta')
			->select('id_tipo as id','nombre')
			->orderBy('nombre')
			->get();
		if(count($ft) > 0 )
			return $ft;
		return false;
	}

	static function store($request, $archivo){
		$alimento = new alimento();
		$alimento->tipo_alimento = $request->input('tipo_alimento');
		$alimento->nombre = $request->input('nombre');
		$alimento->descripcion = $request->input('descripcion');
		$alimento->archivo = $archivo;
		$evento = Event::fire(new dotask($alimento));
		return $evento;
	}

	static function update($id, $request, $archivo = false){
		$alimento = alimento::find($id);
		$alimento->tipo_alimento = $request->tipo_alimento;
		$alimento->nombre = $request->nombre;
		$alimento->descripcion = $request->descripcion;
		if($archivo !== false)
			$alimento->archivo = $archivo;
		$evento = Event::fire(new dotask($alimento));
		return $evento;
	}
};
