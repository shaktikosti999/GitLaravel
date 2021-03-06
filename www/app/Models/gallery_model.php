<?php
namespace App\Models;

class gallery_model{

	static function all($args = []){
		$data = \DB::table('sucursal_galeria')
			->select('id','imagen');
		if( isset($args['id_sucursal']) )
			$data = $data->where('id_sucursal',$args['id_sucursal']);
		$data = $data->get();
		return $data;
	}

	static function store($id,$args=[]){
		if( isset($args['delete']) && count($args['delete']) ){
			$del = \DB::table('sucursal_galeria');
			$images = \DB::table('sucursal_galeria')
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
					'id_sucursal'=>$id,
					'imagen' => $val,
					'tipo' => 1
				];
			}
			$ret2 = \DB::table('sucursal_galeria')->insert($data);
		}
		else
			$ret2 = true;
		if( isset($args['slider']) && count($args['slider']) ){
			foreach( $args['slider'] as $val){
				$data[] = [
					'id_sucursal'=>$id,
					'imagen' => $val,
					'tipo' => 2
				];
			}
			$ret3 = \DB::table('sucursal_galeria')->insert($data);
		}
		else
			$ret3 = true;
		return $del && $ret2 && $ret3;
	}

}