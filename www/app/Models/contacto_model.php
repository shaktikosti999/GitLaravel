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
				'c.created_at as fecha'
			)
			->join('sucursal as s','s.id_sucursal','=','c.id_sucursal')
			->orderBy('s.nombre')
			->orderBy('c.nombre')
			->where('c.eliminado',0)
			->get();
		return $contacto;
	}

};