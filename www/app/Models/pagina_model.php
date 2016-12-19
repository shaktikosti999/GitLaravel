<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\pagina_contenido;
use Illuminate\Support\Str;

class pagina_model{

	static function all(){
		$data = \DB::table('pagina_contenido as padre')
            ->select(
                'padre.id_pagina as id',
                'padre.estatus',
                'padre.link',
                'padre.contenido',
                'hijo.nombre as hijo',
                'padre.nombre as titulo_padre',
                'padre.id_padre',
                \DB::raw('20 as modulo')                    
            )
            ->leftjoin('pagina_contenido as hijo','padre.id_pagina','=','hijo.id_padre')
            ->where('padre.eliminado',0)                
            ->orderBy('padre.orden','ASC')
            ->get();
		return $data;
	}

	static function store($request, $archivo)
	{
		$padre = $request->input('padre');
        $titulo = trim($request->input('titulo'));
        $slug = Str::slug($titulo, '-');
        $contenido = $request->input('contenido');
        $menu_principal = trim($request->input('menu_principal'));
        $menu_inferior = trim($request->input('menu_inferior'));
        $orden = $request->input('orden');
        $link = trim($request->input('link'));
       
        $verifica_slug = \DB::table('pagina_contenido')
                    ->where('slug', '=', $slug)
                    ->count();

        while($verifica_slug >= 1)
        {
            $slug = $slug.mt_rand(1, 1000); 
            $verifica_slug = \DB::table('pagina_contenido')
                    ->where('slug', '=', $slug)
                    ->count();
        }

		$pagina = new pagina_contenido;

        $pagina->id_padre = $padre;
        $pagina->nombre = $titulo;
        $pagina->slug = $slug;
        $pagina->contenido = $contenido;
        $pagina->menu_principal = $menu_principal;
        $pagina->menu_inferior = $menu_inferior;
        $pagina->orden = $orden;
        $pagina->link = $link;
        $pagina->imagen_principal = $archivo;

        $evento = Event::fire(new dotask($pagina));

        return $evento;

	}

	static function get_padres()
	{
		$data = \DB::table('pagina_contenido')
                ->orderBy('nombre')
                ->where('id_padre',0)
                ->where('estatus',1)
                ->select('id_pagina as id','nombre as titulo')
                ->get();

        return $data;
	}

	static function show($id)
	{
		$data = \DB::table('pagina_contenido as pc')
                ->select('pc.*',
                        'p.nombre as titulo_padre'
                        )
                ->where('pc.id_pagina','=',$id)
                ->leftjoin('pagina_contenido as p','pc.id_padre','=','p.id_pagina')
                ->groupBy('pc.id_pagina')
                ->first();
        return $data;
	}

	static function edit($id)
	{
		$data = \DB::table('pagina_contenido as pc')
                ->select('pc.id_pagina','pc.id_padre','pc.nombre as titulo','pc.imagen_principal','pc.contenido',
                        'pc.orden','pc.menu_principal','pc.menu_inferior','pc.link')
                ->where('pc.id_pagina',$id)                
                ->first();

        return $data;
	}

	static function paginas($id)
	{
		$data = \DB::table('pagina_contenido')
                ->orderBy('nombre')
                ->select('id_pagina as id','nombre as titulo')
                ->where('id_pagina','!=',$id)
                ->where('id_padre','=',0)
                ->get();

        return $data;
	}	

	static function actualiza($data, $id)
	{
		$actualiza = \DB::table('pagina_contenido')
                        ->where('pagina_contenido.id_pagina',$id)
                        ->update($data);

        return $actualiza;
	}

};
