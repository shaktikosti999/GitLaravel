<?php
namespace App\Models\front;

use App\Events\dotask;
use Event;

use App\sucursal;
use App\juego_sucursal;
class sucursal_model{
	static function all($args = []){
		$get = \DB::table('sucursal as s')
			->select(
				's.id_sucursal as id',
				's.nombre',
				's.direccion',
				's.telefono',
				's.estatus'
				// \DB::raw('COUNT(j.id_juego) as juegos'),
				// \DB::raw('IF(g.cantidad IS NULL,0,g.cantidad) as galeria')
				// \DB::raw('if(COUNT(s.id_sucursal) = NULL,0,COUNT(s.id_sucursal)) as juegos')
			);
		if( isset($args['id_sucursal']) && !empty($args['id_sucursal']) )
			$get = $get->where('id_sucursal',$args['id_sucursal']);
		$get = $get
			// ->leftJoin('juego_sucursal as j','j.id_sucursal','=','s.id_sucursal')
			// ->leftJoin('count_gallery_images_view as g', 'g.id','=','s.id_sucursal')
			->where('s.eliminado',0)
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

	static function store($request,$ciudad){
		if( (int)$ciudad < 1){
			$data = \DB::table('ciudad')->where('nombre',$ciudad)->get();
			if( count($data) )
				$ciudad = $data[0]->id_ciudad;
			else{
				\DB::table('ciudad')->insert(['nombre' => $ciudad]);
				$data = \DB::table('ciudad')->where('nombre',$ciudad)->first();
				$ciudad = $data->id_ciudad;
			}
		}
		$sucursal = new sucursal;
		$sucursal->id_ciudad = $ciudad;
		$sucursal->nombre = $request->nombre;
		$sucursal->slug = $request->slug;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = $request->latitud;
		$sucursal->longitud = $request->longitud;
		$sucursal->horario = $request->horario;
		$sucursal->instrucciones = $request->instrucciones;
		$sucursal->oferta = $request->oferta;
		$sucursal->telefono = $request->telefono;
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}

	static function storeGame($request,$archivo){
		$juego_sucursal = new juego_sucursal;

		$juego_sucursal->id_juego = $request->input('add_juego');
		$juego_sucursal->id_sucursal = $request->input('add_sucursal');
		$juego_sucursal->descripcion = $request->input('add_desc');
		$juego_sucursal->acumulado = $request->input('add_acumulado');
		$juego_sucursal->archivo = $archivo;
		$juego_sucursal->disponibles = $request->input('add_disp'); 
		$juego_sucursal->apuesta_minima = $request->input('add_apuesta');
		$juego_sucursal->pagado = $request->input('add_pagado');
		$juego_sucursal->link = $request->input('add_link');

		$evento = Event::fire(new dotask($juego_sucursal));
		return $evento;
	}

	static function update($id, $request, $ciudad){
		if( (int)$ciudad < 1){
			$data = \DB::table('ciudad')->where('nombre',$ciudad)->get();
			if( count($data) )
				$ciudad = $data[0]->id_ciudad;
			else{
				\DB::table('ciudad')->insert(['nombre' => $ciudad]);
				$data = \DB::table('ciudad')->where('nombre',$ciudad)->first();
				$ciudad = $data->id_ciudad;
			}
		}
		$sucursal = sucursal::find($id);
		$sucursal->id_ciudad = $ciudad;
		$sucursal->nombre = $request->nombre;
		$sucursal->slug = $request->slug;
		$sucursal->direccion = $request->direccion;
		$sucursal->latitud = $request->latitud;
		$sucursal->longitud = $request->longitud;
		$sucursal->horario = $request->horario;
		$sucursal->instrucciones = $request->instrucciones;
		$sucursal->oferta = $request->oferta;
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
