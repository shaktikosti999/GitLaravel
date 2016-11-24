<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\index_model as index;
use App\Models\front\linea_model as linea;
use App\Models\front\sucursal_model as sucursal;
use App\Models\front\slider_model as slider;
use App\Models\front\promocion_model as promocion;
use App\Models\front\juego_model as juego;

class lineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maquinas( $sucursal = null ){
        $data = [];

        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        //-----> Obtenemos los sliders
        $data["slider"] = linea::find_gallery( 1 );

        //-----> Obtenemos promociones
        $data["promociones"] = promocion::find_all( [ "linea" => 1, "id_sucursal" => $id_sucursal ] );

        //-----> Obtenemos maquinas de juego
        $data["maquinas"] = linea::get_games( [ "linea" => 1, "id_sucursal" => $id_sucursal ] );

        //-----> Obtenemos las categorías de los juegos
        $data["categorias"] = linea::get_categories();

        //-----> Obtenemos los proveedores
        $data["proveedores"] = linea::find_all_providers();
 
        //-----> Obtenemos otras opciones de diversión
        $data["otras"] = linea::find_all( [ "not_in" => [ 1 ] ] );

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        // dd($data);

        return view('front.lineas.maquinas',$data);
    
    }

    public function maquinas_show($slug){
        $juego = juego::find(['slug' => $slug]);

        $data = [
            'juego' => $juego
        ];

        return view('front.juegos.show',$data);
    }

    public function filtro_maquinas()
    {
        
    }

    public function mesas( $sucursal = null ){
        
        $data = [];

        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        //-----> Obtenemos los sliders
        $data["slider"] = linea::find_gallery( 2 );

        //-----> Obtenemos promociones
        $data["promociones"] = promocion::find_all( [ "linea" => 2, "id_sucursal" => $id_sucursal ] );

        //-----> Obtenemos mesas de juego
        $data["mesas"] = linea::get_games( [ "linea" => 2, "id_sucursal" => $id_sucursal ] );

        //-----> Obtenemos los proveedores
        $data["torneos"] = linea::find_all_tournaments( [ "id_sucursal" => $id_sucursal ] );

        //dd( $data["torneos"] );
 
        //-----> Obtenemos otras opciones de diversión
        $data["otras"] = linea::find_all( [ "not_in" => [ 2 ] ] );

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        // -----> Acumulado
        $data['acumulado'] = linea::accumulated(['id_sucursal' => $id_sucursal,'linea' => 2]);
        // dd($data);

        return view('front.lineas.mesas',$data);
    
    }

   
}
