<?php
namespace App\Models\front;

class ciudad_model{

	static function find_all($args = []){
		
        $data = \DB::table('ciudad as c');
		if( isset($args['lista']) ){
			$data = $data
				->distinct()
				->select('c.id_ciudad','c.nombre as ciudad')
				->join('sucursal as s','s.id_ciudad','=','c.id_ciudad')
				->where('s.eliminado',0)
				->where('s.estatus',1);

		}
        else{
			$data = $data->select(
                'c.id_ciudad',
                'c.nombre as ciudad',
                'c.id_municipio'
			);
		}
	    $data = $data
	    	->orderBy('c.nombre')
    	->get();
    	// dd($data);

		return $data;

	}
}