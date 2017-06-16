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

	static function mails(){
		$data = \DB::table('mail_aviso')
			->where('tipo_mail',2)
			->orderBy('mail')
			->get();
		return $data;
	}
}
