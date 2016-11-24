<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\carrerapdf;
class carrerapdf_model{
	static function all(){
		$get = \DB::table('carrerapdf as c')
			->select(
				'c.id_carrerapdf as id',
				'c.titulo',
				'c.fecha',
				'c.archivo',
				's.nombre as sucursal',
				's.id_sucursal',
				'j.nombre as juego'
			)
			->join('sucursal as s','s.id_sucursal','=','c.id_sucursal')
			->join('juego as j','j.id_juego','=','c.id_juego')
			->where('c.eliminado',0)
			->get();
		return ($get);
	}

	static function find($id){
		return carrerapdf::find($id);
	}

	static function store($request,$archivo){
		$data = new carrerapdf;
		$data->id_sucursal = $request->input("sucursal");
		$data->id_juego = $request->input("juego");
		$data->titulo = $request->input("titulo");
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update($id,$request,$archivo=null){
		$data = carrerapdf::find($id);
		$data->id_sucursal = $request->input("sucursal");
		$data->id_juego = $request->input("juego");
		$data->titulo = $request->input("titulo");
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		if($archivo !== null)
			$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}
}