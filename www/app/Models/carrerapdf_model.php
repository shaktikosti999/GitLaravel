<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\carrerapdf;
class carrerapdf_model{
	static function all(){
		$get = \DB::table('carrerapdf as c')
			->select(
				'c.id_carrerapdf as id',
				'c.titulo',
				'c.fecha',
				'c.archivo',
				// 's.nombre as sucursal',
				// 'sc.id_sucursal',
				'j.nombre as juego'
			)
			// ->leftJoin('carrera_sucursal as sc','sc.id_carrera','=','c.id_carrerapdf')
			// ->join('sucursal as s','s.id_sucursal','=','sc.id_sucursal')
			->join('juego as j','j.id_juego','=','c.id_juego')
			->where('c.eliminado',0)
			->get();
		return ($get);
	}

	static function find($id){
		return carrerapdf::find($id);
	}

	static function find_suc($id){
		$data = \DB::table('carrera_sucursal')
			->where('id_carrera',$id)
			->get();
		return $data;
	}

	static function store($request,$archivo){
		$data = new carrerapdf;
		$data->id_juego = $request->input("juego");
		$data->titulo = $request->input("titulo");
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));

		$sucursales = $request->input('sucursal') !== null && count($request->input('sucursal')) ? $request->input('sucursal') : null;
		if($sucursales !== null){
			$sucs = [];
			foreach($sucursales as $item){
				$sucs[] = ['id_carrera'=>$data->id_carrerapdf,'id_sucursal'=>$item];
			}
			\DB::table('carrera_sucursal')->insert($sucs);
		}

		return $evento;
	}

	static function update($id,$request,$archivo=null){
		$data = carrerapdf::find($id);
		// $data->id_sucursal = $request->input("sucursal");
		$data->id_juego = $request->input("juego");
		$data->titulo = $request->input("titulo");
		$data->fecha = date('Y-m-d',strtotime($request->input('fecha')));
		if($archivo !== null)
			$data->archivo = $archivo;
		$evento = Event::fire(new dotask($data));

		\DB::table('carrera_sucursal')->where('id_carrera',$id)->delete();

		$sucursales = $request->input('sucursal') !== null && count($request->input('sucursal')) ? $request->input('sucursal') : null;
		if($sucursales !== null){
			$sucs = [];
			foreach($sucursales as $item){
				$sucs[] = ['id_carrera'=>$id,'id_sucursal'=>$item];
			}

			\DB::table('carrera_sucursal')->insert($sucs);
		}
		else{

		}

		return $evento;
	}
}