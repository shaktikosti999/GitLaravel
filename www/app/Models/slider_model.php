<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\slider;
class slider_model{

	static function all(){
		return \DB::table('slider as s')
			->select('s.*','l.nombre as type_name ')
			->where('s.eliminado',0)
            ->join('linea as l','s.tipo','=','l.id_linea')
			->orderBy('s.tipo')
			->orderBy('s.titulo')
			->get();
	}

	static function store($request,$archivo){

		$maxBranchGroupId = \DB::table('slider')->max('branch_group_id');
		if($maxBranchGroupId == null){
			$maxBranchGroupId = 1;
		}else{
			$maxBranchGroupId++;
		}

	    foreach($request->input('juego') as $juego){

            $data = [];
            $data['tipo'] = $juego;
            $data['titulo'] = $request->input('titulo');
//            $data->subtitulo = $request->input('subtitulo');
//            $data->texto = $request->input('texto');
            $data['imagen'] = $archivo;
//            $data->texto_boton = $request->input('texto_boton');
//            $data->link = $request->input('link');
			$data['branch_group_id'] = $maxBranchGroupId;

			\DB::table('slider')->insert($data);


			$branch = [];
			$branch['id_slider'] = \DB::getPdo()->lastInsertId();
			$branch['descripcion'] = $request->input('titulo');
			$branch['link'] = "";
			$branch['is_active_btn'] = 1;

			if(!empty($request->input('juegoSub'.$juego))) {
				foreach ($request->input('juegoSub' . $juego) as $id) {
					$branch['id_sucursal'] = $id;
					\DB::table('slider_sucursal')->insert($branch);
				}
			}
		}


		return "true";
	}

	static function update($id,$request,$archivo = null){

//		dd($request->all());
		$branchIds = \DB::select('select id,imagen from slider where branch_group_id = (SELECT branch_group_id FROM slider where id ='.$id.')');

		if($archivo==null) {
			$archivo = $branchIds[0]->imagen;
		}

		foreach($branchIds as $id){
			\DB::table('slider')->where('id',$id->id)->delete();
		}
//		dd($request->all());



		$maxBranchGroupId = \DB::table('slider')->max('branch_group_id');
		if($maxBranchGroupId == null){
			$maxBranchGroupId = 1;
		}else{
			$maxBranchGroupId++;
		}

		foreach($request->input('juego') as $juego){

			$data = [];
			$data['tipo'] = $juego;
			$data['titulo'] = $request->input('titulo');
            $data['subtitulo'] = $request->input('subtitulo');
            $data['texto'] = $request->input('texto');
			$data['imagen'] = $archivo;
            $data['texto_boton'] = $request->input('texto_boton');
            $data['link'] = $request->input('link');
			$data['branch_group_id'] = $maxBranchGroupId;
			if($request->input('is_btn_active') == "on") {
				$data['is_btn_active'] = 1;
			}
			if($request->input('is_show_title') == "on") {
				$data['is_show_title'] = 1;
			}else{
				$data['is_show_title'] = 0;
			}


			\DB::table('slider')->insert($data);


			$branch = [];
			$branch['id_slider'] = \DB::getPdo()->lastInsertId();
			$branch['descripcion'] = $request->input('titulo');
			$branch['link'] = "";
			$branch['is_active_btn'] = 1;

			if(!empty($request->input('juegoSub'.$juego))) {
				foreach ($request->input('juegoSub' . $juego) as $id) {
					$branch['id_sucursal'] = $id;
					\DB::table('slider_sucursal')->insert($branch);
				}
			}
		}



		return "true";

//		$data = slider::find($id);
//		$data->titulo = $request->input('titulo');
//		$data->subtitulo = $request->input('subtitulo');
//		$data->texto = $request->input('texto');
//		if( $archivo !== null ){
//			if( file_exists(public_path() . $data->imagen) && is_file(public_path() . $data->imagen) )
//				unlink(public_path() . $data->imagen);
//			$data->imagen = $archivo;
//		}
//		$data->texto_boton = $request->input('texto_boton');
//		$data->link = $request->input('link');
//		$evento = Event::fire(new dotask($data));
//		return $evento;
		return "true";
	}

    static function getAllSliderType(){
        return \DB::table('slider_type')
                ->get();
    }
};
