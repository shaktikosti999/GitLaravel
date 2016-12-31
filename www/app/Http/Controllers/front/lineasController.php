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
use SoapClient;

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
        $data["maquinas"] = linea::get_games( [ "linea" => 1, "id_sucursal" => $id_sucursal, "limit" => 4 ] );

        //-----> Obtenemos maquinas y sus acumulados
        $data["maquinas_acumulado"] = linea::get_games( [ "linea" => 1, "id_sucursal" => $id_sucursal] );

        //-----> Obtenemos las categorías de los juegos
        $data["categorias"] = linea::get_categories();

        //-----> Obtenemos los proveedores
        $data["proveedores"] = linea::find_all_providers();
 
        //-----> Obtenemos otras opciones de diversión
        $data["otras"] = linea::find_all( [ "not_in" => [ 1 ] ] );

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        $data['pagados'] = sucursal::get_paid(['id_sucursal' => $id_sucursal]);

        // dd($data);

        return view('front.lineas.maquinas',$data);
    }

    public function detalle_juego($slug_maquina,$slug){
        $juego = juego::find(['slug' => $slug]);

        $data = [
            'juego' => $juego
        ];

        return view('front.juegos.show',$data);
    }

    public function learn_to_play($slug){
        $data = [
            'juego'=>juego::find(['slug'=>$slug])
        ];
        return view('front.juegos.aprender',$data);
    }

    public function rules_for_game($slug){
        $data = [
            'juego'=>juego::find(['slug'=>$slug])
        ];
        return view('front.juegos.reglas',$data);
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
        $data["mesas"] = linea::get_games( [ "linea" => 2, "id_sucursal" => $id_sucursal] );

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

    public function carreras( $sucursal = null ){
        
        $request = \Request::all();
        $id_juego = ( isset($request['game']) ) ? juego::id_by_slug($request['game']) : null;

        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        //-----> Obtenemos los sliders
        $data["slider"] = linea::find_gallery( 4 );

        //-----> Obtenemos mesas de juego
        $data["carreras"] = linea::get_races();

        //-----> Obtenemos documentos
        $data["programas"] = linea::get_programs( [ "id_sucursal" => $id_sucursal, 'id_juego' => $id_juego ] );

        //-----> Obtenemos los proveedores
        $data["torneos"] = linea::find_all_tournaments( [ "id_sucursal" => $id_sucursal, 'id_juego' => $id_juego ] );

        //dd( $data["torneos"] );
 
        //-----> Obtenemos otras opciones de diversión
        $data["otras"] = linea::find_all( [ "not_in" => [ 4 ] ] );

        //-----> Obtenemos todas las sucursales
        $data["sucursales"] = sucursal::find_all();

        // -----> Acumulado
        $data['acumulado'] = linea::accumulated(['id_sucursal' => $id_sucursal,'linea' => 4]);

        $data['game'] = ( isset($request['game']) ) ? $request['game'] : null;
        // dd($data);

        return view('front.lineas.carreras',$data);
    }
   
    public function deportivas( $sucursal = null){
        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        $data['slider'] = linea::find_gallery( 3 ); //Obtener Sliders
        $data['promociones'] = promocion::find_all( [ "linea" => 3, "id_sucursal" => $id_sucursal ] ); //Obtener promociones
        $data["otras"] = linea::find_all( [ "not_in" => [ 3 ] ] ); // Obtenemos otras opciones de diversión
        $data['quinielas'] = slider::football_pools();// Obtenemos las quinielas

        // -----> Soap
        // Hacer dowhile para la sesión
        // --> Iniciar Sesión
        if( session()->has('soapSession') && session()->has('soapCount') ){
            $soapCount = session('soapCount');
            $soapCount++;
            session()->forget('soapCount');
            session(['soapCount'=>$soapCount]);
        }
        else{
            session()->flush();
            $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/SignOn/SignOnSitio?wsdl');
            $soap = $soap->__soapCall('SignOnSitioOp',[[
                'ip'=>'10.100.240.2',
                'idSitio'=>1
            ]]);
            $data = [
                'soapSession'=>$soap,
                'soapCount'=>1
            ];
            session($data);
        }
        // si no existe una solicitud para deporte, por defecto srá 5
        $dep = (\Request::input('dep') !== null) ? \Request::input('dep') : 5;
        $data['dep'] = $dep;

        // Lista de deportes
        $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaDeportes?wsdl&amp');
        $res = $soap->__soapCall('ListaDeportesOp',[[
            'sesion' => session('soapSession')->sesion,
            'serieMensaje' => session('soapCount')
        ]]);
        $data['deportes'] = $res->deporte;

        //Lista de ligas y ofertas
        $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaAgrupadoresDeportes?wsdl');
        $res = $soap->__soapCall('ListaAgrupadoresDeportesOp',[[
            'sesion' => session('soapSession')->sesion,
            'serieMensaje' => session('soapCount'),
            'numDeporte' => $dep
        ]]);
        $ofertas = [];
        foreach($res->deporte->ligas->liga as $key => $item){
            $ofertas[$key]['id'] = $item->numLiga;
            $ofertas[$key]['nombre'] = $item->nombre;
            if( is_array($item->agrupadores->agrupador) ){
                foreach($item->agrupadores->agrupador as $agrupador){
                    $ofertas[$key]['data'][] = [
                        'id' => $agrupador->idAgrupador,
                        'nombre' => $agrupador->nombre
                    ];
                }
            }
            else{
                $agrupador = $item->agrupadores->agrupador;
                $ofertas[$key]['data'][] = [
                    'id' => $agrupador->idAgrupador,
                    'nombre' => $agrupador->nombre
                ];
            }
        }
        $data['ofertas'] = $ofertas;

         return view('front.lineas.deportiva',$data);
    }
}
