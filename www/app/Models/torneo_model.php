<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\torneo;
class torneo_model{
	static function all(){
		$get = \DB::table('torneo as t')
			->select(
				't.id_torneo as id',
				't.titulo as nombre',
				't.slug',
				't.fecha',
				't.estatus',
				's.nombre as sucursal',
				's.id_sucursal',
				'tt.nombre as tipo'
			)
			->join('sucursal as s','s.id_sucursal','=','t.id_sucursal')
			->join('tipo_torneo as tt','tt.id_tipo','=','t.tipo_torneo')
			->where('t.eliminado',0)
			->where('s.eliminado',0)
			->get();
		return ($get);
	}

	static function find($id){
		return carrerapdf::find($id);
	}

	static function store($request,$archivo){
		$data = new torneo;
		$data->titulo = $request->input('titulo');
		$data->slug = $request->input('slug');
		$data->tipo_torneo = $request->input('tipo');
		$data->id_sucursal = $request->input('sucursal');
		$data->descripcion = $request->input('descripcion');
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		$data->link = $request->input('link');
		$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update($id,$request,$archivo=null){
		$data = torneo::find($id);
		$data->titulo = $request->input('titulo');
		$data->slug = $request->input('slug');
		$data->tipo_torneo = $request->input('tipo');
		$data->id_sucursal = $request->input('sucursal');
		$data->descripcion = $request->input('descripcion');
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		$data->link = $request->input('link');
		if($archivo !== null)
			$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function get_tournament_types(){
		$data = \DB::table('tipo_torneo')
			->select('id_tipo as id',
				'nombre'
			)
			->orderBy('nombre')
			->get();
		return $data;
	}
}