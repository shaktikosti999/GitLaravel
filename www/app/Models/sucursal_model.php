<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\sucursal;
use App\juego_sucursal;
class sucursal_model{
	static function all(){
		$get = \DB::table('sucursal as s')
			->select(
				's.id_sucursal as id',
				's.nombre',
				's.direccion',
				's.telefono',
				's.estatus',
				\DB::raw('if(COUNT(s.id_sucursal) != NULL,COUNT(s.id_sucursal),0) as juegos')
			)
			->leftJoin('juego_sucursal as j','j.id_sucursal','=','s.id_sucursal')
			->where('eliminado',0)
			->groupBy('s.id_sucursal')
			->get();
		return $get;
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

	static function storeGame($request,$archivo){
		$data = array(
			'id_juego' => $request->input('add_juego'),
			'id_sucursal' => $request->input('add_sucursal'),
			'descripcion' => $request->input('add_desc'),
			'archivo' => $archivo,
			'disponibles' => $request->input('add_disp'),
			'apuesta_minima' => $request->input('add_apuesta'),
			'link' => $request->input('add_link')
		);
		return \DB::table('juego_sucursal')->insert($data);
	}

	static function list_sucursal_games($id){
		$get = \DB::table('juego_sucursal as js')->
			select(
				'js.id_juego',
				'j.nombre as juego',
				'js.descripcion'
			)
			->join('juego as j','j.id_juego','=','js.id_juego')
			->where('js.id_sucursal',$id)
			->get();
		return $get;
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
