<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\juego;
use Illuminate\Support\Str;

class juego_model{
	static function all($args = []){
		$sucursal = \DB::table('juego as j')
			->select(
				'j.id_juego as id',
				'j.nombre',
				'j.titulo',
				'j.estatus',
				'l.nombre as linea',
				'l.id_linea'
			)
			->join('linea as l','l.id_linea','=','j.id_linea')
			->where('l.eliminado',0)
			->where('j.eliminado',0)
			->orderBy('j.nombre');
			if( isset($args['id_linea']) )
				$sucursal = $sucursal->where('j.id_linea',$args['id_linea']);
			$sucursal = $sucursal->get();
		return $sucursal;
	}

	static function get_game_lines(){
		$lineas = \DB::table('linea')
			->select('nombre','id_linea as id')
			->where('eliminado',0)
			->orderBy('nombre')
			->get();
		return $lineas;
	}

	static function find($id){
		return juego::find($id);
	}

	static function list_games(){
		$get = \DB::table('juego')
			->select('id_juego as id', 'nombre')
			->get();
		return $get;
	}

	static function store($request,$archivo,$categoria = null,$thumb = null){

		if( $categoria !== null ){
			if( (int)$categoria < 1 ){

				$cat = \DB::table('categoria_juego')
					->select('id')
					->where('nombre',$categoria)
					->first();
				
				if( count($cat) )
					$cat = $cat->id;
				else{
					$data = ['nombre'=>$categoria];
					\DB::table('categoria_juego')->insert($data);
					$cat = \DB::table('categoria_juego')
						->select('id')
						->where('nombre',$categoria)
						->first();
					$cat = $cat->id;
				}
			}
			else
				$cat = (int)$categoria;

		}

		$sucursal = new juego;
		$sucursal->id_linea = $request->linea;
		$sucursal->id_categoria = $categoria !== null ? $cat : null;
		$sucursal->nombre = $request->nombre;
		$sucursal->titulo = $request->titulo;
		$sucursal->resumen = $request->resumen;
		$sucursal->aprender = $request->aprender;
		$sucursal->reglas = $request->reglas;
		$sucursal->imagen = $archivo;
		$sucursal->thumb = $thumb;
		$sucursal->slug = Str::slug($request->nombre, '-');
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}

	static function update($id, $request, $archivo = null,$categoria = null,$thumb = null){

		if( $categoria !== null ){
			if( (int)$categoria < 1 ){

				$cat = \DB::table('categoria_juego')
					->select('id')
					->where('nombre',$categoria)
					->first();
				
				if( count($cat) )
					$cat = $cat->id;
				else{
					$data = ['nombre'=>$categoria];
					\DB::table('categoria_juego')->insert($data);
					$cat = \DB::table('categoria_juego')
						->select('id')
						->where('nombre',$categoria)
						->first();
					$cat = $cat->id;
				}
			}
			else
				$cat = (int)$categoria;

		}

		$sucursal = juego::find($id);
		$sucursal->id_linea = $request->linea;
		$sucursal->id_categoria = $categoria !== null ? $cat : null;
		$sucursal->nombre = $request->nombre;
		$sucursal->titulo = $request->titulo;
		$sucursal->resumen = $request->resumen;
		$sucursal->aprender = $request->aprender;
		$sucursal->reglas = $request->reglas;
		if( $archivo !== null ){
			if( file_exists(public_path() . '/' . $sucursal->imagen) && is_file(public_path() . '/' . $sucursal->imagen) ){
				unlink(public_path() . '/' . $sucursal->imagen);
			}
			$sucursal->imagen = $archivo;
		}
		if( $thumb !== null ){
			if( file_exists(public_path() . '/' . $sucursal->thumb) && is_file(public_path() . '/' . $sucursal->thumb) ){
				unlink(public_path() . '/' . $sucursal->thumb);
			}
			$sucursal->thumb = $thumb;
		}
		$sucursal->slug = Str::slug($request->nombre, '-');
		$evento = Event::fire(new dotask($sucursal));
		return $evento;
	}
};
