<?php
namespace App\Models\front;

class pagina_model{

	static function get_inside_page(int $id = null){
		$get = \DB::table('contenido_simple as cs')
			->select(
				'cs.nombre',
				'cs.slug',
				// 'cs.resumen',
				'cs.imagen_principal'				
			)
			->join('contenido_interno as ci', 'ci.id_interno','=','cs.id_contenido')
			->orderBy('ci.orden');
		if($id !== null)
			$get = $get->where('ci.id_simple',$id);
		$get = $get->get();
		return $get;
	}

	static function get_page($slug){

		$get = \DB::table('contenido_simple')
			->where('slug',$slug)
			->first();

		if(count($get) > 0 )
			return $get;

		return false;
	}

	static function get_sons($id){
		$get = \DB::table('contenido_simple')
			->where('id_padre',$id)
			->get();
		return $get;
	}

	static function menu(){
		$menu=array();
		$get = \DB::table('contenido_simple')
			->select(
				'icon',
				'icon_hover',
				'id_contenido',
				'nombre_span',
				'nombre',
				'slug'
			)
			->where('id_padre',0)
			->where('menu_principal',1)
			->orderBy('orden','ASC')
			->get();

		foreach($get as $val)
			$id[] = $val->id_contenido;

		$son = \DB::table('contenido_simple')
			->select(
				'id_padre as id',
				'nombre_span',
				'icon',
				'nombre',
				'slug'
			)
			->whereIn('id_padre',$id)
			->where('menu_principal',1)
			->orderBy('orden','ASC')
			->get();

		foreach($get as $val)
			$menu[$val->id_contenido]=[
				'nombre_span'=>$val->nombre_span,
				'nombre'=>$val->nombre,
				'slug'=>$val->slug,
				'icon'=>$val->icon,
				'icon_hover'=>$val->icon_hover
			];

		foreach($son as $val)
			$menu[$val->id]['sub'][]=['nombre'=>$val->nombre,'slug'=>$val->slug];

		// dd($menu);

		if(count($menu) > 0)
			return $menu;
		return false;
	}

}