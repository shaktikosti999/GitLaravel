<?php
namespace App\Models;

class gallery_line_model{

	static function all($args = []){
		$data = \DB::table('linea_galeria')
			->select('id','imagen');
		if( isset($args['id_linea']) )
			$data = $data->where('id_linea',$args['id_linea']);
		$data = $data->get();
		return $data;
	}

	static function store($id,$args=[]){
		if( isset($args['delete']) && count($args['delete']) ){
			$del = \DB::table('linea_galeria');
			$images = \DB::table('linea_galeria')
				->select('imagen');
			foreach($args['delete'] as $val){
				$del = $del->orwhere('id',$val);
				$images = $images->orWhere('id',$val);
			}
			$images = $images->get();
			if( count($images) ){
				foreach( $images as $val ){
					$borrar = public_path() . $val->imagen;
					if( file_exists($borrar) && is_file($borrar) )
						unlink($borrar);
				}
			}
			$del = $del->delete();

		}
		else
			$del = true;
		if( isset($args['new']) && count($args['new']) ){
			foreach( $args['new'] as $val){
				$data[] = [
					'id_linea'=>$id,
					'imagen' => $val
				];
			}
			$ret2 = \DB::table('linea_galeria')->insert($data);
		}
		else
			$ret2 = true;
		return $del && $ret2;
	}

}