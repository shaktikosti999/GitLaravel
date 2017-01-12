<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\calendario;
class calendario_model{
	static function all(){
		$data = \DB::table('calendario_pago as p')
			->select(
				'p.id_pago as id',
				'p.titulo as nombre',
				's.id_sucursal',
				's.nombre as sucursal',
				'c.nombre as categoria',
				'p.descripcion',
				'p.inicio',
				'p.estatus',
				'p.fin'
			)
			->join('sucursal as s','s.id_sucursal','=','p.id_sucursal')
			->join('calendario_categoria as c','c.id_categoria','=','p.id_categoria')
			->where('p.eliminado',0)
			->get();
		return $data;
	}

	static function delete_slider($id = []){
		if( isset($id) && count($id) ){
			$data = \DB::table('calendario_slider');
			foreach( $id as $val)
				$data = $data->orWhere('id_slider',$val);
			$data->delete();
		}
	}

	static function get_categories($args = []){
		$data = \DB::table('calendario_categoria')
			->select('id_categoria as id','nombre')
			->get();
		return $data;
	}

	static function slider($id){
		$data = \DB::table('calendario_slider as s')
			->where('id_sucursal',$id)
			->get();
		return $data;
	}

	static function store($request,$categoria){
		if( (int)$categoria < 1 ){
			$data = \DB::table('calendario_categoria')
				->select('id_categoria')
				->where('nombre',$categoria)
				->get();
			if( count($data) > 0 ){
				$categoria = $data[0]->id_categoria;
			}
			else{
				\DB::table('calendario_categoria')
					->insert(['nombre' => $categoria]);
				$data = \DB::table('calendario_categoria')
					->select('id_categoria')
					->where('nombre',$categoria)
					->first();
				$categoria = $data->id_categoria;
			}
		}

		$inicio = date('Y-m-d H:i:s',strtotime($request->input('fecha') . ' ' . $request->input('hora_inicio')));
		$fin = date('Y-m-d H:i:s',strtotime($request->input('fecha') . ' ' . $request->input('hora_fin')));

		$data = new calendario;
		$data->id_categoria = $categoria;
		$data->id_sucursal = $request->input('sucursal');
		$data->titulo = $request->input('titulo');
		$data->descripcion = $request->input('descripcion');
		$data->inicio = $inicio;
		$data->fin = $fin;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update($id,$request,$categoria){
		if( (int)$categoria < 1 ){
			$data = \DB::table('calendario_categoria')
				->select('id_categoria')
				->where('nombre',$categoria)
				->get();
			if( count($data) > 0 ){
				$categoria = $data[0]->id_categoria;
			}
			else{
				\DB::table('calendario_categoria')
					->insert(['nombre' => $categoria]);
				$data = \DB::table('calendario_categoria')
					->select('id_categoria')
					->where('nombre',$categoria)
					->first();
				$categoria = $data->id_categoria;
			}
		}

		$inicio = date('Y-m-d H:i:s',strtotime($request->input('fecha') . ' ' . $request->input('hora_inicio')));
		$fin = date('Y-m-d H:i:s',strtotime($request->input('fecha') . ' ' . $request->input('hora_fin')));

		$data = calendario::find($id);
		$data->id_categoria = $categoria;
		$data->id_sucursal = $request->input('sucursal');
		$data->titulo = $request->input('titulo');
		$data->descripcion = $request->input('descripcion');
		$data->inicio = $inicio;
		$data->fin = $fin;
		$evento = Event::fire(new dotask($data));
		return $evento;
	}

	static function update_slider($id,$titulo){
		$data = \DB::table('calendario_slider')
			->where('id_slider',$id)
			->update(['titulo' => $titulo]);
		$queries = \DB::getQueryLog();
		return $data;
	}
};