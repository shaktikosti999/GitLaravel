<?php
namespace App\Models\front;

class configuracion_model{



	static function find_all( ){
		
        $data = \DB::table('configuracion as c')
                    ->select('c.*')
                    ->get();
		return $data;
	}

}