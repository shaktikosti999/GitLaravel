<?php
namespace App\Models;

use App\Events\dotask;
use Event;

use App\pagina_contenido;
use Illuminate\Support\Str;

class pagina_model{

    static function all(){
        $data = \DB::table('contenido_simple as padre')
            ->select(
                'padre.id_contenido as id',
                'padre.estatus',
                'padre.link',
                'padre.contenido',
                'hijo.titulo as hijo',
                'padre.titulo as titulo_padre',
                'padre.id_padre',
                \DB::raw('20 as modulo')                    
            )
            ->leftjoin('contenido_simple as hijo','padre.id_contenido','=','hijo.id_padre')
            ->where('padre.eliminado',0)  
            ->orderBy('padre.titulo','ASC')
            ->get();
        return $data;
    }

    static function store($request, $archivo)
    {
        $padre          = $request->input('padre');
        $titulo         = trim($request->input('titulo'));
        $slug           = trim($request->input('slug'));
        $contenido      = $request->input('contenido');
        $menu_principal = trim($request->input('menu_principal'));
        $menu_inferior  = trim($request->input('menu_inferior'));
        $orden          = 0;
        $link           = trim($request->input('link'));
       
        $verifica_slug = \DB::table('contenido_simple')
                    ->where('slug', '=', $slug)
                    ->count();

        while($verifica_slug >= 1)
        {
            $slug = $slug.mt_rand(1, 1000); 
            $verifica_slug = \DB::table('contenido_simple')
                    ->where('slug', '=', $slug)
                    ->count();
        }

        $pagina = new pagina_contenido;

        $pagina->id_padre       = $padre;
        $pagina->titulo         = $titulo;
        $pagina->slug           = $slug;
        $pagina->archivo        = $archivo;
        $pagina->contenido      = $contenido;
        $pagina->orden          = $orden;
        $pagina->menu_principal = $menu_principal;
        $pagina->menu_inferior  = $menu_inferior;
        $pagina->link           = $link;        

        // dd($pagina);

        $evento = Event::fire(new dotask($pagina));

        return $evento;

    }

    static function get_padres()
    {
        $data = \DB::table('contenido_simple')
                ->orderBy('titulo')
                ->where('id_padre',0)
                ->where('estatus',1)
                ->select('id_contenido as id','titulo')
                ->get();

        return $data;
    }

    static function show($id)
    {
        $data = \DB::table('contenido_simple as pc')
                ->select('pc.*',
                        'p.titulo as titulo_padre'
                        )
                ->where('pc.id_contenido','=',$id)
                ->leftjoin('contenido_simple as p','pc.id_padre','=','p.id_contenido')
                ->groupBy('pc.id_contenido')
                ->first();
        return $data;
    }

    static function edit($id)
    {
        $data = \DB::table('contenido_simple as pc')
                ->select('pc.id_contenido','pc.id_padre','pc.titulo','pc.archivo as imagen_principal','pc.contenido','pc.orden','pc.slug','pc.menu_principal','pc.menu_inferior','pc.link')
                ->where('pc.id_contenido',$id)                
                ->first();

        return $data;
    }

    static function paginas($id)
    {
        $data = \DB::table('contenido_simple')
                ->orderBy('titulo')
                ->select('id_contenido as id','titulo')
                ->where('id_contenido','!=',$id)
                ->where('id_padre','=',0)
                ->get();

        return $data;
    }   

    static function actualiza($id,$request,$archivo = null){
        $pagina = pagina_contenido::find($id);
        if( $request->eliminada == 1 || $archivo !== null){
            $borrar = public_path() . $pagina->archivo;
            if( file_exists($borrar) && is_file($borrar) )
                unlink($borrar);
            if( $archivo !== null )
                $pagina->archivo = $archivo;
            else
                $pagina->archivo = '';
        }
        $pagina->titulo = $request->input('titulo');
        $pagina->slug = $request->input('slug');
        $pagina->orden = $request->input('orden') !== null ? $request->input('orden') : '';
        $pagina->contenido = $request->input('contenido');
        $pagina->menu_principal = $request->input('menu_principal') !== null ? $request->input('menu_principal') : '';
        $pagina->menu_inferior = $request->input('menu_inferior') !== null ? $request->input('menu_inferior') : '';
        $pagina->link = $request->input('link') !== null ? $request->input('link') : '';
        $evento = Event::fire(new dotask($pagina));
        return $evento;
    }

};
