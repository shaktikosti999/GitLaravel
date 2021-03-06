<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\red_social;
class red_social_model{

	static function all(){
		$get = \DB::table('red_social as r')
			->select(
				'r.id_red as id',
				'r.link as url',
				'r.estatus',
				'r.texto as sucursal',
				't.nombre as red'
			)
			->join('tipo_red as t','t.id_tipo','=','r.tipo')
			->where('r.eliminado',0)
			->get();
		return $get;
	}

	static function find($id){
		return red_social::find($id);
	}

	static function social_networks(){
		$get = \DB::table('tipo_red')
			->select('id_tipo as id','nombre')
			->orderBy('nombre')
			->get();

		return $get;
	}

	static function store($request){
		$data = new red_social;
		$data->tipo = $request->red;
		$data->texto = $request->texto;
		$data->link = $request->url;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update($request,$id){
		$data = red_social::find($id);
		$data->tipo = $request->red;
		$data->texto = $request->texto;
		$data->link = $request->url;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

};
