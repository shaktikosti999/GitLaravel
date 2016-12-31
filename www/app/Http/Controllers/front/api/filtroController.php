<?php

namespace App\Http\Controllers\front\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\linea_model as linea;
use App\Models\front\sucursal_model as sucursal;
use SoapClient;

class filtroController extends Controller
{
    public function filtro_maquinas(Request $request)
    {
        
        if($request->ajax()){

            $id_categoria = $request->input('id_categoria');
            $id_categoria == "" ? $id_categoria = null : $id_categoria = $id_categoria;

            $slug_sucursal = $request->input('slug_sucursal'); 
            $slug_sucursal == -1 ? $slug_sucursal = null : $slug_sucursal = $slug_sucursal;            
            
            $ids_maquinas = $request->input('ids_maquinas'); 
            $ids_maquinas == "" ? $ids_maquinas = null : $ids_maquinas = $ids_maquinas;

            $limit = $request->input('limit');
            
            $linea = $request->input('linea');
            $linea == "" ? $linea = null : $linea = $linea;

            if ($slug_sucursal == null) {
                $id_sucursal = null;
            }else{
                $suc = sucursal::get_sucursal($slug_sucursal);                     
                $id_sucursal = $suc[0]->id_sucursal;                       
            }   

            echo json_encode(linea::get_games( [ "linea" => $linea, "id_sucursal" => $id_sucursal, "id_categoria" => $id_categoria, "not_id" => $ids_maquinas, "limit" => $limit ] ) );
        }
        else
            abort(403);
    }

    public function get_lineas(Request $request){
        if( $request->ajax() ){
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

            $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaEventosDeportes?wsdl');
            $linea = $soap->__soapCall('ListaEventosDeportesOp',[[
                'sesion'=>session('soapSession')->sesion,
                'numDeporte' => $request->input('deporte'),
                'idAgrupador'=> $request->input('oferta'),
                'numLiga'=> $request->input('liga'),
            ]]);
            $data = [];
            if( isset($linea->evento) ){
                if( is_array($linea->evento) ){
                    foreach($linea->evento as $key => $item ){
                        $data[$key]['fecha'] = date('Y-m-d',strtotime($item->fecha));
                        $data[$key]['hora'] = date('h:iA',strtotime($item->fecha));
                        if( is_array($item->bis->bi) ){
                            foreach($item->bis->bi as $val){
                                $data[$key]['data'][] = [
                                    'id_apuesta' => $val->numBi,
                                    'nombre' => $val->contendiente->nombre,
                                    'puntos' => isset($val->linPuntos->linea) && $val->linPuntos->linea !== null ? $val->linPuntos->linea : null
                                ];
                            }
                        }
                        else{
                            $val = $item->bis->bi;
                            $data[$key]['data'][] = [
                                'id_apuesta' => $val->numBi,
                                'nombre' => $val->contendiente->nombre,
                                'puntos' =>  isset($val->linPuntos->linea) && $val->linPuntos->linea !== null ? $val->linPuntos->linea : null
                            ];
                        }
                    }
                }
                else{
                    $key = 0;
                    $item = $linea->evento;
                    $data[$key]['fecha'] = date('Y-m-d',strtotime($item->fecha));
                    $data[$key]['hora'] = date('h:iA',strtotime($item->fecha));
                    if( is_array($linea->evento->bis->bi) ){
                        foreach($linea->evento->bis->bi as $val){
                            $data[$key]['data'][] = [
                                'id_apuesta' => $val->numBi,
                                'nombre' => $val->contendiente->nombre,
                                'puntos' =>  isset($val->linPuntos->linea) && $val->linPuntos->linea !== null ? $val->linPuntos->linea : null
                            ];
                        }
                    }
                    else{
                        $val = $linea->evento->bis->bi;
                        $data[$key]['data'][] = [
                            'id_apuesta' => $val->numBi,
                            'nombre' => $val->contendiente->nombre,
                            'puntos' =>  isset($val->linPuntos->linea) && $val->linPuntos->linea !== null ? $val->linPuntos->linea : null
                        ];
                    }
                }
            }
            // $data['fecha'] = date('Y-m-d h:iA',strtotime($linea->fecha));

            echo json_encode($data);
        }
        else
            abort(403);
    }

    public function get_mesa(Request $request)
    {
        if($request->ajax())
        {
            $id_mesa = $request->input('id_mesa');
            $id_mesa == "" ? $id_mesa = null : $id_mesa = $id_mesa;

            echo json_encode( linea::get_games( [ "id" => $id_mesa ] ) );

        }
        else
            abort(403);

    }
}