<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\sucursal;
class sucursal{
	static function all(){
		$sucursal = \DB::table('sucursal')
			->select(
				'id_sucursal as id',
				'nombre',
				'direccion',
				'telefono',
				'estatus'
			)
			->where('eliminado',0)
			->get();
		return $sucursal;
	}

	static function find($id){
		return sucursal::find($id);
	}

	static function store($request){
		$sucursal = new sucursal;
		$sucursal->nombre = $request->nombre;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = rand() % 100;//$request->latitud;
		$sucursal->longitud = rand() % 100;//$request->longitud;
		$sucursal->horario = $request->horario;
		$sucursal->instrucciones = $request->instrucciones;
		$sucursal->telefono = $request->telefono;
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}

	static function update($id, $request){
		$sucursal = sucursal::find($id);
		$sucursal->nombre = $request->nombre;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = rand() % 100;//$request->latitud;
		$sucursal->longitud = rand() % 100;//$request->longitud;
		$sucursal->horario = $request->horario;
		$sucursal->instrucciones = $request->instrucciones;
		$sucursal->telefono = $request->telefono;
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}
};
