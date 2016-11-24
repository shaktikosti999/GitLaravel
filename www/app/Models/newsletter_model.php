<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\newsletter;
class newsletter_model{
	static function all(){
		$newsletter = \DB::table('newsletter as n')
			->select('n.id_newsletter as id',
				// 's.nombre as sucursal',
				'n.telefono',
				'n.nombre',
				'n.mail',
				'n.estatus',
				'n.created_at as fecha'
			)
			// ->leftJoin('newsletter_sucursal as ns','ns.id_newsletter','=','n.id_newsletter')
			// ->leftJoin('sucursal as s','s.id_sucursal','=','ns.id_sucursal')
			// ->orderBy('s.nombre')
			->orderBy('n.nombre')
			->where('n.eliminado',0)
			->get();
		return $newsletter;
	}

	static function find($id){
		return alimento::find($id);
	}

	static function get_file_name($id){
		$file = \DB::table('alimento as a')
			->select('archivo')
			->where('id_newsletter',$id)
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
		$alimento = new alimento();
		$alimento->tipo_alimento = $request->input('tipo_alimento');
		$alimento->nombre = $request->input('nombre');
		$alimento->descripcion = $request->input('descripcion');
		$alimento->archivo = $archivo;
		$evento = Event::fire(new dotask($alimento));
		return $evento;
	}

	static function update($id, $request, $archivo = false){
		$alimento = alimento::find($id);
		$alimento->tipo_alimento = $request->tipo_alimento;
		$alimento->nombre = $request->nombre;
		$alimento->descripcion = $request->descripcion;
		if($archivo !== false)
			$alimento->archivo = $archivo;
		$evento = Event::fire(new dotask($alimento));
		return $evento;
	}
};
