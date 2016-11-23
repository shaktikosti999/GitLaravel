<?php
namespace App\Models\front;

class ciudad_model{

	static function find_all(){
		
        $data = \DB::table('ciudad as c')
            			->select(
                            'c.id_ciudad',
                            'c.nombre as ciudad',
                            'c.id_municipio'
            			)->get();
		return $data;

	}
}