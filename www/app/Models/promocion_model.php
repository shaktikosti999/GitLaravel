<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\promocion;
class promocion_model{
	static function all(){
		$data = \DB::table('promocion as p')
			->select('p.id_promocion as id','j.nombre as juego','p.nombre','p.slug','p.estatus')
			->join('juego as j','j.id_juego','=','p.id_juego')
			->orderBy('p.nombre')
			->where('p.eliminado',0)
			->get();
		return $data;
	}

	static function find($id){
		return promocion::find($id);
	}

	static function store($request, $archivo){
		$data = new promocion();

		$data->id_juego = $request->input('juego');
		$data->nombre = $request->input('nombre');
		$data->slug = $request->input('slug');
		$data->resumen = $request->input('resumen');
		$data->imagen = $archivo;
		$data->descripcion = $request->input('descripcion');
		$data->fecha_inicio = $request->input('fecha_inicio');
		$data->fecha_fin = $request->input('fecha_fin');

		$evento = Event::fire(new dotask($data));
		// dd($evento,$data);
		return $evento;
	}

	static function update($id, $request, $archivo = false){
		$data = promocion::find($id);
		
		$data->id_juego = $request->input('juego');
		$data->nombre = $request->input('nombre');
		$data->slug = $request->input('slug');
		$data->resumen = $request->input('resumen');
		if($archivo !== false)
			$data->imagen = $archivo;
		$data->descripcion = $request->input('descripcion');
		$data->fecha_inicio = $request->input('fecha_inicio');
		$data->fecha_fin = $request->input('fecha_fin');

		$evento = Event::fire(new dotask($data));
		// dd($evento,$data);
		return $evento;
	}
};
