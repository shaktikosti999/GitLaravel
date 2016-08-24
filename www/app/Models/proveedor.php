<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\proveedor;
class proveedor{
	static function all(){
		$all = \DB::table('proveedor')
			->select('id_proveedor as id','nombre','link','estatus')
			->orderBy('nombre')
			->where('eliminado',0)
			->get();
		return $all;
	}

	static function find($id){
		return proveedor::find($id);
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
		$proveedor = new proveedor();
		$proveedor->nombre = $request->input('nombre');
		$proveedor->link = $request->input('link');
		$proveedor->archivo = $archivo;
		$evento = Event::fire(new dotask($proveedor));
		return $evento;
	}

	static function update($id, $request, $archivo = false){
		$proveedor = proveedor::find($id);
		$proveedor->nombre = $request->nombre;
		$proveedor->link = $request->link;
		if($archivo !== false)
			$proveedor->archivo = $archivo;
		$evento = Event::fire(new dotask($proveedor));
		return $evento;
	}
};
