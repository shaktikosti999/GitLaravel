<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\slider;
class configuracion_model{

	static function all(){
		return \DB::table('configuracion as s')
			->select('s.*')
			->get();
	}

	static function store($request){

		$data['titulo'] = $request->input('titulo');
		$data['cantidad'] = $request->input('cantidad');
		$data['url'] = $request->input('url');

		if($request->input('is_new_tab') == 'on') {
			$data['is_new_tab'] = '_blank';
		} else {
			$data['is_new_tab'] = '_self';
		}

		\DB::table('configuracion')->insert($data);
	}

	static function update($id,$request){

		$data['titulo'] = $request->input('titulo');
		$data['cantidad'] = $request->input('cantidad');
		$data['url'] = $request->input('url');

		if($request->input('is_new_tab') == 'on') {
			$data['is_new_tab'] = '_blank';
		} else {
			$data['is_new_tab'] = '_self';
		}

		return \DB::table('configuracion')
				->where('id_configuracion', $id)
				->update($data);

	}

	static function delete($id){
		return \DB::table('configuracion')
				->where('id_configuracion', $id)
				->delete();
	}



    static function find($id){
        $data = \DB::table('configuracion')
				->where('id_configuracion',$id)
                ->get();

		return $data[0];
    }
};
