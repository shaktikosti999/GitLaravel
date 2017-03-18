<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\linea_model as linea;
use \App\Models\gallery_line_model as galeria;
class lineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'lineas' => linea::all()
        );
        return view('back.linea.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('back.linea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required|string|max:50|min:1',
            'slug' => 'required|string',
            'slogan' => 'required|string',
            'icono' => 'required|string',
            'archivo' => 'required|image'
        ]);

        $archivo = $request->file('archivo');
        $ext = strtolower($archivo->getClientOriginalExtension());
        $extValidas = ['jpg','jpeg','png'];

        if(in_array($ext, $extValidas)){
            $carpeta = 'assets/images/lineadejuego/';
            if(!file_exists(public_path() . '/' . $carpeta))
                mkdir(public_path() . '/' . $carpeta,0777,true);
            do{
                $nombre = "";
                $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                for($i=0; $i<=16; $i++ ){
                    $nombre .= substr($str, rand(0,strlen($str)-1) ,1 );
                }
            }while(file_exists(public_path() . '/' . $carpeta . $nombre . '.' . $ext));
            $nombre .= '.' . $ext;
            if($archivo->move(public_path() . '/' . $carpeta , $nombre)){
                $archivo = '/' . $carpeta . $nombre;

                $evento = linea::store($request,$archivo);
                $evento = $evento[0];
                if(!$evento){
                    return redirect(url('/administrador/linea.html'))->with('success','Linea de juego agregada correctamente');
                }
                else{
                    return redirect(url('/administrador/linea.html'))->with('error',$evento);
                }
            }
        }                    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = array(
            'id'=>$id,
            'linea' => linea::find($id)
        );
        return view('back.linea.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'nombre' => 'required|string|max:50|min:1',
            'slug' => 'required|string',
            'slogan' => 'required|string',
            'icono' => 'required|string',
            'archivo' => 'image'
        ]);

        if($request->hasFile('archivo')){

            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/lineadejuego/';
                if(!file_exists(public_path() . '/' . $carpeta))
                    mkdir(public_path() . '/' . $carpeta,0777,true);
                do{
                    $nombre = "";
                    $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                    for($i=0; $i<=16; $i++ ){
                        $nombre .= substr($str, rand(0,strlen($str)-1) ,1 );
                    }
                }while(file_exists(public_path() . '/' . $carpeta . $nombre . '.' . $ext));
                $nombre .= '.' . $ext;
                if($archivo->move(public_path() . '/' . $carpeta , $nombre)){
                    $archivo = '/' . $carpeta . $nombre;

                }
            }
        }
        else
            $archivo = false;
        $evento = linea::update($id,$request,$archivo);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/linea.html'))->with('success','Linea de juego agregada correctamente');
        }
        else{
            return redirect(url('/administrador/linea.html'))->with('error',$evento);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}

    public function getGallery(Request $request){
        if( $request->ajax() ){
            $this->validate($request,[
                'id'=>'required|integer|min:1'
            ]);
            $data = galeria::all(['id_linea'=>$request->input('id')]);
            echo json_encode($data);
        }
    }

    public function saveGallery(Request $request){
        if($request->hasFile('add_archivo')){
            $archivos = [];
            foreach( $request->file('add_archivo') as $archivo){
                $ext = strtolower($archivo->getClientOriginalExtension());
                $extValidas = ['jpg','jpeg','png'];

                if(in_array($ext, $extValidas)){
                    $carpeta = 'assets/images/lineadejuego/galeria/';
                    if(!file_exists(public_path() . '/' . $carpeta))
                        mkdir(public_path() . '/' . $carpeta,0777,true);
                    do{
                        $nombre = "";
                        $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                        for($i=0; $i<=16; $i++ ){
                            $nombre .= substr($str, rand(0,strlen($str)-1) ,1 );
                        }
                    }while(file_exists(public_path() . '/' . $carpeta . $nombre . '.' . $ext));
                    $nombre .= '.' . $ext;
                    if($archivo->move(public_path() . '/' . $carpeta , $nombre)){
                        $archivos[] = '/' . $carpeta . $nombre;
                    }
                }                    
            }
        }
        else
            $archivos = null;
        if( galeria::store($request->input('add_linea'),['new'=>$archivos,'delete'=>$request->input('delete')]) )
            return redirect('administrador/linea.html')->with('success','Galería actualizada');
        return redirect('administrador/linea.html')->with('warning','Hubo error al hacer los cambios');
    }
    public function deportivas( $sucursal = null){
        // $this->soapLoggin();
        $data["sucursal"] = $sucursal;

        //-----> Obtenemos detalle de sucursal seleccionada
        $data["sucursal_info"] = sucursal::find_by_slug( $sucursal );
        $id_sucursal = ( $data["sucursal_info"] ) ? $data["sucursal_info"]->id_sucursal : null;

        $data['slider'] = linea::find_gallery( 3 ); //Obtener Sliders
        $data['promociones'] = promocion::find_all( [ "linea" => 3, "id_sucursal" => $id_sucursal ] ); //Obtener promociones
        $data["otras"] = linea::find_all( [ "not_in" => [ 3 ] ] ); // Obtenemos otras opciones de diversión
        $data['quinielas'] = slider::football_pools();// Obtenemos las quinielas

       
        // si no existe una solicitud para deporte, por defecto srá 5
        $dep = (\Request::input('dep') !== null) ? \Request::input('dep') : 5;
        $data['dep'] = $dep;

        if($dep == 5){
            
        }

        // Lista de deportes
        // $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/Deportes/ListaDeportes?wsdl&amp');
        // $res = $soap->__soapCall('ListaDeportesOp',[[
        //     'sesion' => session('soapSession')->sesion,
        //     'serieMensaje' => session('soapCount')
        // ]]);

        // if( isset($res->descripcionError) && $res->descripcionError == "Sesion Invalida" ){
        //     session()->forget('soapSession');
        //     session()->forget('soapCount');
        //     $this->soapLoggin();
        // }


        // $data['deportes'] = $res->deporte;

        // //Lista de ligas y ofertas
        // $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/Deportes/ListaAgrupadoresDeportes?wsdl');
        // $res = $soap->__soapCall('ListaAgrupadoresDeportesOp',[[
        //     'sesion' => session('soapSession')->sesion,
        //     'serieMensaje' => session('soapCount'),
        //     'numDeporte' => $dep
        // ]]);

        $ofertas = [];
        // if( isset($res->deporte->ligas->liga) ){
        //     // dd( $res->deporte->ligas->liga );
        //     if( is_array($res->deporte->ligas->liga) ){
        //         foreach($res->deporte->ligas->liga as $key => $item){
        //             $ofertas[$key]['id'] = $item->numLiga;
        //             $ofertas[$key]['nombre'] = $item->nombre;
        //             if( is_array($item->agrupadores->agrupador) ){
        //                 foreach($item->agrupadores->agrupador as $agrupador){
        //                     $props = [];
        //                     if($agrupador->proposicion){
        //                         if( is_array($agrupador->proposiciones->proposicion) ){
        //                             foreach($agrupador->proposiciones->proposicion as $kp => $vp){
        //                                 $ofertas[$key]['data'][] = [
        //                                     'id' =>$vp->idProposicion,
        //                                     'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                                 ];
        //                             }
        //                         }
        //                         else{
        //                             $vp = $agrupador->proposiciones->proposicion;
        //                             $ofertas[$key]['data'][] = [
        //                                 'id' =>$vp->idProposicion,
        //                                 'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                             ];
        //                         }
        //                     }
        //                     else{
        //                         $ofertas[$key]['data'][] = [
        //                             'id' => $agrupador->idAgrupador,
        //                             'nombre' => $agrupador->nombre
        //                         ];
        //                     }
        //                 }
        //             }
        //             else{
        //                 $agrupador = $item->agrupadores->agrupador;
        //                 $props = [];
        //                 if($agrupador->proposicion){
        //                     if( is_array($agrupador->proposiciones->proposicion) ){
        //                         foreach($agrupador->proposiciones->proposicion as $kp => $vp){
        //                             $ofertas[$key]['data'][] = [
        //                                 'id' =>$vp->idProposicion,
        //                                 'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                             ];
        //                         }
        //                     }
        //                     else{
        //                         $vp = $agrupador->proposiciones->proposicion;
        //                         $ofertas[$key]['data'][] = [
        //                             'id' =>$vp->idProposicion,
        //                             'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                         ];
        //                     }
        //                 }
        //                 else{
        //                     $ofertas[$key]['data'][] = [
        //                         'id' => $agrupador->idAgrupador,
        //                         'nombre' => $agrupador->nombre
        //                     ];
        //                 }
        //             }
        //         }
        //     }
        //     else{
        //         $key = 0;
        //         $item = $res->deporte->ligas->liga;
        //         $ofertas[$key]['id'] = $item->numLiga;
        //             $ofertas[$key]['nombre'] = $item->nombre;
        //             if( is_array($item->agrupadores->agrupador) ){
        //                 foreach($item->agrupadores->agrupador as $agrupador){
        //                     $props = [];
        //                     if($agrupador->proposicion){
        //                         if( is_array($agrupador->proposiciones->proposicion) ){
        //                             foreach($agrupador->proposiciones->proposicion as $kp => $vp){
        //                                 $ofertas[$key]['data'][] = [
        //                                     'id' =>$vp->idProposicion,
        //                                     'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                                 ];
        //                             }
        //                         }
        //                         else{
        //                             $vp = $agrupador->proposiciones->proposicion;
        //                             $ofertas[$key]['data'][] = [
        //                                 'id' =>$vp->idProposicion,
        //                                 'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                             ];
        //                         }
        //                     }
        //                     else{
        //                         $ofertas[$key]['data'][] = [
        //                             'id' => $agrupador->idAgrupador,
        //                             'nombre' => $agrupador->nombre
        //                         ];
        //                     }
        //                 }
        //             }
        //             else{
        //                 $agrupador = $item->agrupadores->agrupador;
        //                 $props = [];
        //                 if($agrupador->proposicion){
        //                     if( is_array($agrupador->proposiciones->proposicion) ){
        //                         foreach($agrupador->proposiciones->proposicion as $kp => $vp){
        //                             $ofertas[$key]['data'][] = [
        //                                 'id' =>$vp->idProposicion,
        //                                 'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                             ];
        //                         }
        //                     }
        //                     else{
        //                         $vp = $agrupador->proposiciones->proposicion;
        //                         $ofertas[$key]['data'][] = [
        //                             'id' =>$vp->idProposicion,
        //                             'nombre' => $agrupador->nombre . ' -> ' . $vp->nombre
        //                         ];
        //                     }
        //                 }
        //                 else{
        //                     $ofertas[$key]['data'][] = [
        //                         'id' => $agrupador->idAgrupador,
        //                         'nombre' => $agrupador->nombre
        //                     ];
        //                 }
        //             }
        //     }
        // }
        // dd($data);
        $data['ofertas'] = $ofertas;

         return view('front.lineas.deportiva',$data);
    }
    
}
