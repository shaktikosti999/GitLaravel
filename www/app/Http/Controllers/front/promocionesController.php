<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\linea_model as linea;
use App\Models\front\promocion_model as promocion;
use App\Models\front\sucursal_model as sucursal;
use App\Models\front\calendario_model as calendario;

class promocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $sucursal = null ){
        
        $data = [];

        $data["id_linea"] = \Input::get('linea');

        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        //-----> Obtenemos promociones
        $data["promociones"] = promocion::find_all( [ "id_sucursal" => $id_sucursal, "id_linea" => $data["id_linea"] ] );
 
        //-----> Obtenemos otras opciones de diversión
        $data["lineas"] = linea::find_all();

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        //dd($data);

        return view('front.promociones.index',$data);
    
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

        //-----> Obtenemos maquinas de juego
        $data["maquinas"] = linea::find_all_games( [ "linea" => 2, "id_sucursal" => $id_sucursal ] );

        //-----> Obtenemos los proveedores
        $data["torneos"] = linea::find_all_tournaments( [ "id_sucursal" => $id_sucursal ] );

        //dd( $data["torneos"] );
 
        //-----> Obtenemos otras opciones de diversión
        $data["otras"] = linea::find_all( [ "not_in" => [ 2 ] ] );

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        //dd($data);

        return view('front.lineas.mesas',$data);
    
    }

    /**
     *   Muestra los detales de cada promoción
     *
     */
    public function details($slug){
        $data = [
            'promocion' => promocion::find(['slug' => $slug])
        ];
        return view('front.promociones.show',$data);
    }

    public function show($slug){
        $promocion = calendario::find(['slug' => $slug]);
        $data = [
            'promocion' => $promocion,
            'slider' => calendario::slider(['slug' => $slug])
        ];
        // dd($data);

        return view('front.promociones.promotions',$data);
    }
}
