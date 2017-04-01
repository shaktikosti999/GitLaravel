<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\slider;
class slider_model{

	static function all(){
		return \DB::table('slider')
			->select('slider.titulo','slider.subtitulo','slider_type.type_name','slider.link','slider.estatus','slider.id')
			->where('eliminado',0)
            ->join('slider_type','slider.tipo','=','slider_type.id')
			->orderBy('tipo')
			->orderBy('titulo')
			->get();
	}

	static function store($request,$archivo){

	    for($i=0;$i<count($request->input('tipo'));$i++){
            $data = new slider;
            $data->tipo = $request->input('tipo')[$i];
            $data->titulo = $request->input('titulo');
//            $data->subtitulo = $request->input('subtitulo');
//            $data->texto = $request->input('texto');
            $data->imagen = $archivo;
//            $data->texto_boton = $request->input('texto_boton');
//            $data->link = $request->input('link');
            $evento = Event::fire(new dotask($data));
        }
		return $evento;
	}

	static function update($id,$request,$archivo = null){
		$data = slider::find($id);

		if($request->input('is_show_title')==null){
			$titileShowHide = 0;
		}else{
			$titileShowHide = 1;
		}
		$data->titulo = $request->input('titulo');
		$data->subtitulo = $request->input('subtitulo');
		$data->is_show_title = $titileShowHide;
		$data->texto = $request->input('texto');
		if( $archivo !== null ){
			if( file_exists(public_path() . $data->imagen) && is_file(public_path() . $data->imagen) )
				unlink(public_path() . $data->imagen);
			$data->imagen = $archivo;
		}
		$data->texto_boton = $request->input('texto_boton');
		$data->link = $request->input('link');
//		dd($data);
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

    static function getAllSliderType(){
        return \DB::table('slider_type')
                ->get();
    }
};
