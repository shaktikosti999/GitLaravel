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
				\DB::raw('COUNT(j.id_juego) as juegos')
				// \DB::raw('if(COUNT(s.id_sucursal) = NULL,0,COUNT(s.id_sucursal)) as juegos')
			)
			->leftJoin('juego_sucursal as j','j.id_sucursal','=','s.id_sucursal')
			->where('eliminado',0)
			->groupBy('s.id_sucursal')
			->orderBy('s.nombre')
			->get();
		return $get;
	}

	static function deleteGame($id_juego,$id_sucursal){
		$imagen = \DB::table('juego_sucursal')
			->where('id_juego',$id_juego)
			->where('id_sucursal',$id_sucursal)
			->first();
		if( file_exists(public_path() . $imagen->archivo) && is_file(public_path() . $imagen->archivo) )
			unlink(public_path() . $imagen->archivo);
		return \DB::table('juego_sucursal')
			->where('id_juego',$id_juego)
			->where('id_sucursal',$id_sucursal)
			->delete();
	}

	static function find($id){
		return sucursal::find($id);
	}

	static function info_game($sucursal,$id){
		$data = \DB::table('juego as j')
			->select(
				'js.descripcion',
				'js.archivo',
				'js.link',
				'js.disponibles',
				'js.apuesta_minima',
				'js.acumulado',
				'js.pagado'
			)
			->join('juego_sucursal as js','js.id_juego','=','j.id_juego')
			->where('js.id_juego',$id)
			->where('js.id_sucursal',$sucursal)
			->first();
		return $data;
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

	static function store($request){
		$sucursal = new sucursal;
		$sucursal->id_ciudad = $request->ciudad;
		$sucursal->nombre = $request->nombre;
		$sucursal->slug = $request->slug;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = $request->latitud;
		$sucursal->longitud = $request->longitud;
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
			'acumulado' => $request->input('add_acumulado'),
			'archivo' => $archivo,
			'disponibles' => $request->input('add_disp'),
			'apuesta_minima' => $request->input('add_apuesta'),
			'pagado' => $request->input('add_pagado'),
			'link' => $request->input('add_link')
		);
		return \DB::table('juego_sucursal')->insert($data);
	}

	static function update($id, $request){
		$sucursal = sucursal::find($id);
		$sucursal->id_ciudad = $request->ciudad;
		$sucursal->nombre = $request->nombre;
		$sucursal->slug = $request->slug;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = $request->latitud;
		$sucursal->longitud = $request->longitud;
		$sucursal->horario = $request->horario;
		$sucursal->instrucciones = $request->instrucciones;
		$sucursal->telefono = $request->telefono;
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}

	static function updateGame($request,$archivo){
		$data = array(
			'descripcion' => $request->input('add_desc'),
			'acumulado' => $request->input('add_acumulado'),
			'disponibles' => $request->input('add_disp'),
			'apuesta_minima' => $request->input('add_apuesta'),
			'pagado' => $request->input('add_pagado'),
			'link' => $request->input('add_link')
		);
		
		if( isset($archivo) && !empty($archivo) ){
			$imagen = \DB::table('juego_sucursal')
				->where('id_juego',$request->input('add_juego'))
				->where('id_sucursal',$request->input('add_sucursal'))
				->first();
			if( file_exists(public_path() . $imagen->archivo) && is_file(public_path() . $imagen->archivo) )
				unlink(public_path() . $imagen->archivo);
			$data['archivo'] = $archivo;
		}
		return \DB::table('juego_sucursal')
			->where('id_juego',$request->input('add_juego'))
			->where('id_sucursal',$request->input('add_sucursal'))
			->update($data);
	}
	
};
