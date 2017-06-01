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

		$parentArray = [];
		if(!empty($request->input('juego'))) {
			$parentArray = $request->input('juego');
		}

		$isParentShow = 0;
		if(!empty($request->input('juegoSub'))){
			foreach($request->input('juegoSub') as $key=>$juegoSub) {
				if(!empty($request->input('juego')) && in_array($key,$request->input('juego'))){
					$searchKey = array_search($key, $request->input('juego'));
					unset($parentArray[$searchKey]);
					$isParentShow = 1;
				}
				if(!empty($request->input('juego')) && !in_array($key,$request->input('juego'))){
					$isParentShow = 0;
				}
				$branch = [];
				$data = [];
				$data['tipo'] = $key;
				$data['titulo'] = $request->input('titulo');
				$data['subtitulo'] = $request->input('subtitulo');
				$data['texto'] = $request->input('texto');
				$data['imagen'] = $archivo;
				$data['texto_boton'] = $request->input('texto_boton');
				$data['link'] = $request->input('link');
				$data['branch_group_id'] = $maxBranchGroupId;
				$data['isParentShow'] = $isParentShow;
				$data['video_url'] = $request->input('video_url');

				if($request->input('showImageVideo') == 'showVideo') {
					$data['is_show_img_video'] = 1;
				} else {
					$data['is_show_img_video'] = 0;
				}

				if($request->input('is_show_title') == 'on') {
					$data['is_show_title'] = 1;
				} else {
					$data['is_show_title'] = 0;
				}

				if($request->input('is_btn_active') == 'on') {
					$data['is_btn_active'] = 1;
				} else {
					$data['is_btn_active'] = 0;
				}

				if($request->input('is_new_tab') == 'on') {
					$data['is_new_tab'] = '_blank';
				} else {
					$data['is_new_tab'] = '_self';
				}

				$data['texto_boton'] = $request->input('texto_boton');
				$data['link'] = $request->input('link');

				\DB::table('slider')->insert($data);

				$branch['id_slider'] = \DB::getPdo()->lastInsertId();
				foreach ($juegoSub as $id) {
					$branch['id_sucursal'] = $id;
					\DB::table('slider_sucursal')->insert($branch);
				}
			}
		}

		if (!empty($parentArray)){
			$isParentShow = 1;
			foreach($parentArray as $parent) {
				$data = [];
				$data['tipo'] = $parent;
				$data['titulo'] = $request->input('titulo');
				$data['subtitulo'] = $request->input('subtitulo');
				$data['texto'] = $request->input('texto');
				$data['imagen'] = $archivo;
				$data['texto_boton'] = $request->input('texto_boton');
				$data['link'] = $request->input('link');
				$data['branch_group_id'] = $maxBranchGroupId;
				$data['isParentShow'] = 1;
				$data['video_url'] = $request->input('video_url');

				if($request->input('showImageVideo') == 'showVideo') {
					$data['is_show_img_video'] = 1;
				} else {
					$data['is_show_img_video'] = 0;
				}

				if ($request->input('is_show_title') == 'on') {
					$data['is_show_title'] = 1;
				} else {
					$data['is_show_title'] = 0;
				}

				if ($request->input('is_btn_active') == 'on') {
					$data['is_btn_active'] = 1;
				} else {
					$data['is_btn_active'] = 0;
				}

				if($request->input('is_new_tab') == 'on') {
					$data['is_new_tab'] = '_blank';
				} else {
					$data['is_new_tab'] = '_self';
				}
				$data['texto_boton'] = $request->input('texto_boton');
				$data['link'] = $request->input('link');

				\DB::table('slider')->insert($data);
			}
		}
		return "true";
	}

	static function update($id,$request,$archivo = null){

		$branchIds = \DB::select('select id,imagen from slider where branch_group_id = (SELECT branch_group_id FROM slider where id ='.$id.')');

		if($archivo==null) {
			$archivo = $branchIds[0]->imagen;
		}

		foreach($branchIds as $id){
			\DB::table('slider')->where('id',$id->id)->delete();
		}
		self::store($request,$archivo);




//		$maxBranchGroupId = \DB::table('slider')->max('branch_group_id');
//		if($maxBranchGroupId == null){
//			$maxBranchGroupId = 1;
//		}else{
//			$maxBranchGroupId++;
//		}
//
//		foreach($request->input('juego') as $juego){
//
//			$data = [];
//			$data['tipo'] = $juego;
//			$data['titulo'] = $request->input('titulo');
//            $data['subtitulo'] = $request->input('subtitulo');
//            $data['texto'] = $request->input('texto');
//			$data['imagen'] = $archivo;
//            $data['texto_boton'] = $request->input('texto_boton');
//            $data['link'] = $request->input('link');
//			$data['branch_group_id'] = $maxBranchGroupId;
//			if($request->input('is_btn_active') == "on") {
//				$data['is_btn_active'] = 1;
//			}
//			if($request->input('is_show_title') == "on") {
//				$data['is_show_title'] = 1;
//			}else{
//				$data['is_show_title'] = 0;
//			}
//
//
//			\DB::table('slider')->insert($data);
//
//
//			$branch = [];
//			$branch['id_slider'] = \DB::getPdo()->lastInsertId();
//			$branch['descripcion'] = $request->input('titulo');
//			$branch['link'] = "";
//			$branch['is_active_btn'] = 1;
//
//			if(!empty($request->input('juegoSub'.$juego))) {
//				foreach ($request->input('juegoSub' . $juego) as $id) {
//					$branch['id_sucursal'] = $id;
//					\DB::table('slider_sucursal')->insert($branch);
//				}
//			}
//		}



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
