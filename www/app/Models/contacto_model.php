<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\contacto;
class contacto_model{
	static function all(){
		$contacto = \DB::table('contacto as c')
			->select('c.id_contacto as id',
				's.nombre as sucursal',
				'c.telefono',
				'c.nombre',
				'c.email',
				\DB::raw( // ----> Asignación del tipo de pregunta
					'if(c.tipo_mensaje = 1, "Duda", 
						if(c.tipo_mensaje=2 , "Sugerencia", 
							if(c.tipo_mensaje=3,"Felicitación","Queja")
						)
					) as tipo'
				),
				'c.created_at as fecha'
			)
			->leftJoin('sucursal as s','s.id_sucursal','=','c.id_sucursal')
			->orderBy('c.created_at')
			->orderBy('s.nombre')
			->orderBy('c.nombre')
			->where('c.eliminado',0)
			->get();
		return $contacto;
	}

	static function find_message($id){
		$get = contacto::select('mensaje')
			->find($id);

		return $get->mensaje;

	}

	static function store($request){
		$contacto = new contacto;
		$contacto->id_sucursal		=	$request->input('field-sucursal') !== null && $request->input('field-sucursal') > 0 ? $request->input('field-sucursal') : null;
		$contacto->tipo_mensaje		=	$request->input('field-tipo');
		$contacto->nombre			=	$request->input('field-name');
		$contacto->email			=	$request->input('field-email');
		$contacto->tarjeta			=	$request->input('field-card');
		$contacto->telefono			=	$request->input('field-phone');
		$contacto->mensaje			=	$request->input('field-message');
		$contacto->promociones		=	$request->input('field-promo') !== null && $request->input('field-promo') != 0 ? 1 : 0;
		return $contacto->save();

	}

};