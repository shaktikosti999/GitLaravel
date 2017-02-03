<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\promocion;
class promocion_model{
	static function all(){
		$data = \DB::table('promocion as p')
			->select(
				'p.id_promocion as id',
				'l.nombre as juego',
				'p.nombre',
				'p.slug',
				'p.estatus'
			)
			->join('linea as l','l.id_linea','=','p.id_juego')
			->orderBy('p.nombre')
			->where('p.eliminado',0)
			->get();
			// ->toSql();
		// dd($data);
		return $data;
	}

	static function addBranchPromotion($request,$archivo=null){
		$data = [];
		if( $request->input('add_sucursal') !== null && count($request->input('add_sucursal')) ){
			foreach($request->input('add_sucursal') as $item ){
				$data[] = [
					'id_promocion' => $request->input('add_promocion'),
					'id_sucursal' => $item,
					'descripcion' => $request->input('add_desc') !== null ?  $request->input('add_desc'): '',
					'archivo' => $archivo !== null ?  $archivo : '',
					'link' => $request->input('add_archivo') !== null ? $request->input('add_archivo') : ''
				];
			}
			return \DB::table('promocion_sucursal')->insert($data);
		}
		return true;
	}

	static function find($id){
		return promocion::find($id);
	}

	static function find_pay($id){
		$data = \DB::table('pago_promocion')
			->select(
				'id_sucursal as sucursal',
				'titulo',
				'descripcion',
				'inicio',
				'fin'
			)
			->where('id_pago',$id)
			->first();
		$data->fecha = date('m/d/Y',strtotime($data->inicio));
		$data->inicio = date('H:i A',strtotime($data->inicio));
		$data->fin = date('H:i A',strtotime($data->fin));
		return $data;
	}

	static function get_branches($id){
		
		$data = \DB::table('promocion_sucursal as ps')
			->select(
				's.id_sucursal as id',
				's.nombre'
			)
			->join('sucursal as s','s.id_sucursal','=','ps.id_sucursal')
			->where('ps.id_promocion',$id)
			->get();
		return $data;
	}

	static function get_dynamics($id){
		$data = \DB::table('pago_promocion as pp')
			->select(
				'id_pago as id',
				'titulo'
			)
			->where('id_promocion',$id)
			->get();
		return $data;
	}

	static function get_promotions($args){
		$data = \DB::table('promocion_sucursal as ps')
			->select(
				\DB::raw('IF (ps.descripcion != "",ps.descripcion,p.descripcion) AS descripcion'),
				\DB::raw('IF (ps.archivo != "",ps.archivo,CONCAT("/assets/",p.imagen) ) AS archivo'),
				\DB::raw('IF (ps.link != "",ps.link,p.slug) AS link'),
				'ps.id_promocion',
				'ps.id_sucursal',
				's.nombre'
			)
			->join('promocion as p','p.id_promocion','=','ps.id_promocion')
			->join('sucursal as s','s.id_sucursal','=','ps.id_sucursal');
		if( isset($args['id_promocion']) && !empty($args['id_promocion']) )
			$data = $data->where('ps.id_promocion',$args['id_promocion']);
		if( isset($args['id_sucursal']) && !empty($args['id_sucursal']) )
			$data = $data->where('ps.id_sucursal',$args['id_sucursal']);
		$data = $data->get();
		return $data;
	}

	static function store($request, $archivo, $thumb){
		$data = new promocion();

		$data->id_juego = $request->input('juego');
		$data->nombre = $request->input('nombre');
		$data->slug = $request->input('slug');
		$data->resumen = $request->input('resumen');
		$data->imagen = $archivo;
		$data->thumb = $thumb;
		$data->descripcion = $request->input('descripcion');
		$data->fecha_inicio = trim($request->input('fecha_inicio')) != "" ? $request->input('fecha_inicio') : null;
		$data->fecha_fin = trim($request->input('fecha_fin')) != "" ? $request->input('fecha_fin') : null;

		$evento = Event::fire(new dotask($data));
		// dd($evento,$data);
		return $evento;
	}

	// static function store_dinamica($request){
	// 	$promocion = $request->input('pay_id_promocion');
	// 	foreach($request->input('pay_sucursal') as $item){
	// 		$data[] = [
	// 			'id_promocion' => $promocion,
	// 			'id_sucursal' => $item,
	// 			'titulo' => $request->input('pay_titulo'),
	// 			'descripcion' => $request->input('pay_desc'),
	// 			'inicio' => date('Y-m-d H:i:s', strtotime($request->input('pay_date') . ' ' . $request->input('pay_date1'))),
	// 			'fin' => date('Y-m-d H:i:s', strtotime($request->input('pay_date') . ' ' . $request->input('pay_date2')))
	// 		];
	// 	}
	// 	return \DB::table('pago_promocion')->insert($data);
	// }
	static function store_dinamica($request){
		$promocion = $request->input('pay_id_promocion');
		foreach($request->input('pay_sucursal') as $item){
			$data[] = [
				'id_promocion' => $promocion,
				'id_sucursal' => $item,
				'titulo' => $request->input('pay_titulo'),
				'descripcion' => $request->input('pay_desc'),
				'inicio' => date('Y-m-d H:i:s', strtotime($request->input('pay_date') . ' ' . $request->input('pay_date1'))),
				'fin' => date('Y-m-d H:i:s', strtotime($request->input('pay_date') . ' ' . $request->input('pay_date2')))
			];
		}
		return \DB::table('pago_promocion')->insert($data);
	}

	static function update($id, $request, $archivo = null,$thumb = null){
		$data = promocion::find($id);

		if( $archivo !== null ){
			$borrar = public_path() . $data->archivo;
			if( is_file($borrar) )
				unlink($borrar);
		}

		if( $thumb !== null ){
			$borrar = public_path() . $data->thumb;
			if( is_file($borrar) )
				unlink($borrar);
		}
		
		$data->id_juego = $request->input('juego');
		$data->nombre = $request->input('nombre');
		$data->slug = $request->input('slug');
		$data->resumen = $request->input('resumen');
		if($archivo !== null)
			$data->imagen = $archivo;
		if($thumb !== null)
			$data->thumb = $thumb;
		$data->descripcion = $request->input('descripcion');
		$data->fecha_inicio = trim($request->input('fecha_inicio')) != "" ? $request->input('fecha_inicio') : null;
		$data->fecha_fin = trim($request->input('fecha_fin')) != "" ? $request->input('fecha_fin') : null;

		$evento = Event::fire(new dotask($data));
		// dd($evento,$data);
		return $evento;
	}

	static function updateBranchPromotion($request,$archivo=null){
		$data = [
			'descripcion' => $request->input('add_desc') !== null ?  $request->input('add_desc'): '',
			'link' => $request->input('add_link') !== null ? $request->input('add_link') : '',
		];
		if( $archivo !== null && !empty($archivo) && trim($archivo) != "" ){
			$data['archivo'] = $archivo;

			$imagen = \DB::table('promocion_sucursal')
				->select('archivo')
				->where('id_promocion',$request->input('add_promocion'))
				->where('id_sucursal',$request->input('add_sucursal'))
				->first();
			$imagen = public_path() . $imagen->archivo;
			if( file_exists($imagen) && is_file($imagen) && $archivo !== null)
				unlink($imagen);
		}

		$query = \DB::table('promocion_sucursal')
			->where('id_promocion',$request->input('add_promocion'))
			->where('id_sucursal',$request->input('add_sucursal'))
			->update($data);

		return $query;
	}


	static function destroy_promotion($id_promocion,$id_sucursal){
		$imagen = \DB::table('promocion_sucursal')
			->select('archivo')
			->where('id_promocion',$id_promocion)
			->where('id_sucursal',$id_sucursal)
			->first();
		$imagen = public_path() . $imagen->archivo;
		if( file_exists($imagen) && is_file($imagen) )
			unlink($imagen);

		$query = \DB::table('promocion_sucursal')
			->where('id_promocion',$id_promocion)
			->where('id_sucursal',$id_sucursal)
			->delete();

		return $query;
	}

};
