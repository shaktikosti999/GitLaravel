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
