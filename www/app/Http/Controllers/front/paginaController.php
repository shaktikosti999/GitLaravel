<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\pagina_model as pagina;

class paginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $slug = explode(url() . '/', \Request::url());
        $slug = end($slug);

        $pagina = pagina::get_page($slug);

        if(is_object($pagina)){
            $data = array(
                'pagina' => $pagina,
                'son' => pagina::get_sons($pagina->id_contenido),
                'vinicolas' => pagina::get_attraction(null,['a.tipo_atraccion'=>1])
            );
            return view('front.vino',$data);
        }
        abort(404);
    }

    public function arte(){
        $slug          = explode('/', \Request::url());
        $parent_slug   = $slug[ count( $slug ) - 2 ];
        $son_slug      = $slug[ count( $slug ) - 1 ];

       //-----> Obtenemos contenido de pagina y subpagina
        $pagina     = pagina::get_page( $parent_slug );
        $son_page   = pagina::get_page( $son_slug );

        //-----> Definimos la vista a cargar
        $view = ( ! isset( $son_page->vista ) || ! $son_page->vista ) ? 'front.arte' : 'front.' . $son_page->vista ;

        $events = ( $son_page->vista == 'agenda' ) ? pagina::get_attraction( ['ta.id_tipo' => 3] ) : [] ;

        //-----> Obtenemos banners
        $banners = pagina::get_banners();

        //print "<pre>"; var_dump( $son_page ); print "</pre>"; exit;
        
        if( is_object( $pagina ) ){

            $data = array(

                'atracciones' => pagina::get_attraction(['a.tipo_atraccion'=>3],null),
                'banners'   => $banners,
                'events'    => $events,
                'pagina'    => $pagina,
                'paginas_internas'=> pagina::get_inside_page(/*$pagina->id_contenido*/),
                'son'       => pagina::get_sons( $pagina->id_contenido ),
                'son_page'  => $son_page,
                'atraccion_aleatoria' => pagina::atraccion_random(),
                'video_aleatorio' => pagina::video_random()

            );
            // dd($data);
            //print "<pre>"; var_dump( $data["vinicolas"] ); print "</pre>"; exit;
            return view( $view , $data );
        }

        abort(404);
    }
}
