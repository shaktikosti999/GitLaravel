<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\slider;
class slider_model{

	static function all(){
		return \DB::table('slider')->where('eliminado',0)->get();
	}

	static function store($request,$archivo){
		$data = new slider;
		$data->titulo = $request->input('titulo');
		$data->imagen = $archivo;
		$data->texto_boton = $request->input('texto_boton');
		$data->link = $request->input('link');
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update($id,$request,$archivo = null){
		$data = slider::find($id);
		$data->titulo = $request->input('titulo');
		if( $archivo !== null ){
			if( file_exists(public_path() . $data->imagen) && is_file(public_path() . $data->imagen) )
				unlink(public_path() . $data->imagen);
			$data->imagen = $archivo;
		}
		$data->texto_boton = $request->input('texto_boton');
		$data->link = $request->input('link');
		$evento = Event::fire(new dotask($data));
		return $evento;
	}
};
