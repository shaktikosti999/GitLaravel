<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\sucursal_model as sucursal;
use \App\Models\gallery_model as galeria;
class sucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = array(
            'sucursales' => sucursal::all(),
            'juegos' => \App\Models\juego_model::list_games()
        );
        // dd($data);
        return view('back.sucursal.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
            'ciudades' => \App\Models\front\ciudad_model::find_all()
        ];
        return view('back.sucursal.create',$data);
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
            'ciudad' => 'required|integer|min:0',
            'direccion' => 'required|string|min:5|max:255',
            'slug' => 'required|string',
            'latitud' => 'string',
            'longitud' => 'string',
            'horario' => 'required|string',
            'instrucciones' => 'required|string',
            'telefono' => 'required|string',
            'oferta' => 'string'
        ]);
        $ciudad = (int)trim($request->input('ciudad')) > 0 ? trim($request->input('ciudad')) : trim($request->input('ciudad_txt'));
        $evento = sucursal::store($request,$ciudad);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/sucursal.html'))->with('success','Sucursal agregada correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error',$evento);
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
        $data=array(
            'id' => $id,
            'ciudades' => \App\Models\front\ciudad_model::find_all(),
            'sucursal' => sucursal::find($id)
        );
        return view('back.sucursal.edit',$data);
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
            'ciudad' => 'required|integer|min:0',
            'direccion' => 'required|string|min:5|max:255',
            'slug' => 'required|string',
            'latitud' => 'string',
            'longitud' => 'string',
            'horario' => 'required|string',
            'instrucciones' => 'required|string',
            'telefono' => 'required|string',
            'oferta' => 'string'
        ]);
        $ciudad = (int)trim($request->input('ciudad')) > 0 ? trim($request->input('ciudad')) : trim($request->input('ciudad_txt'));
        // dd($ciudad);
        $evento = sucursal::update($id,$request,$ciudad);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/sucursal.html'))->with('success','Sucursal agregada correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error',$evento);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}

    /**
     * Regresa la lista de juegos de una sucursal específica.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function games(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'sucursal' => 'required|integer'
            ]);
            $juegos = sucursal::list_sucursal_games($request->input('sucursal'));
            echo json_encode($juegos);
        }
    }

    public function infogames(Request $request){
        $this->validate($request,[
            'sucursal' => 'required|integer',
            'id' => 'required|integer'
        ]);
        $juegos = sucursal::info_game($request->input('sucursal'),$request->input('id'));
        echo json_encode($juegos);
    }

    /**
     * RAgregar nuevo juego a sucursal
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gamesStore(Request $request){
        $this->validate($request,[
            'add_juego' => 'required|integer',
            'add_desc' => 'required|string',
            'add_disp' => 'required|integer',
            'add_apuesta' => 'required|integer',
            'add_pagado' => 'integer',
            'add_link' => 'required',
            'add_archivo' => 'image',
            'add_sucursal' => 'required|integer'
        ]);
        
        $archivo = '';
        //subir imagen
        if($request->hasFile('add_archivo')){
            $archivo = $request->file('add_archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/juegos/';
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
        $evento = sucursal::storeGame($request,$archivo);
        if($evento !== false){
            return redirect(url('/administrador/sucursal.html'))->with('success','Juego agregado correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error','Los datos no fueron almacenados');
        }
    }

    public function gamesUpdate(Request $request){
        $this->validate($request,[
            'add_desc' => 'required|string',
            'add_disp' => 'required|integer',
            'add_apuesta' => 'required|integer',
            'add_pagado' => 'integer',
            'add_link' => 'required',
            'add_archivo' => 'image',
            'add_sucursal' => 'required|integer'
        ]);
        //subir imagen
        if($request->hasFile('add_archivo')){
            $archivo = $request->file('add_archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/juegos/';
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
            $archivo = null;
        $evento = sucursal::updateGame($request,$archivo);
        if($evento !== false){
            return redirect(url('/administrador/sucursal.html'))->with('success','Juego modificado correctamente');
        }
        else{
            return redirect(url('/administrador/sucursal.html'))->with('error','Los datos no fueron modificados');
        }
    }

    public function gameDelete(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'id_juego' => 'required|integer',
                'id_sucursal' => 'required|integer',
            ]);
            sucursal::deleteGame($request->input('id_juego'),$request->input('id_sucursal'));
        }
        else
            abort(503);
    }

    public function getGallery(Request $request){
        if( $request->ajax() ){
            $this->validate($request,[
                'id'=>'required|integer|min:1'
            ]);
            $data = galeria::all(['id_sucursal'=>$request->input('id')]);
            echo json_encode($data);
        }
    }

    public function saveGallery(Request $request){
        // dd($request->all());
        if($request->hasFile('add_archivo')){
            $archivos = [];
            foreach( $request->file('add_archivo') as $archivo){
                $ext = strtolower($archivo->getClientOriginalExtension());
                $extValidas = ['jpg','jpeg','png'];

                if(in_array($ext, $extValidas)){
                    $carpeta = 'assets/images/sucursal/galeria/';
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

        if($request->hasFile('add_galeria')){
            $slides = [];
            foreach( $request->file('add_galeria') as $archivo){
                $ext = strtolower($archivo->getClientOriginalExtension());
                $extValidas = ['jpg','jpeg','png'];

                if(in_array($ext, $extValidas)){
                    $carpeta = 'assets/images/sucursal/galeria/';
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
                        $slides[] = '/' . $carpeta . $nombre;
                    }
                }                    
            }
        }
        else
            $slides = null;


        if( galeria::store($request->input('add_sucursal'),['new'=>$archivos,'slider'=>$slides, 'delete'=>$request->input('delete')]) )
            return redirect('administrador/sucursal.html')->with('success','Galería actualizada');
        return redirect('administrador/sucursal.html')->with('warning','Hubo error al hacer los cambios');
    }

    public function add_pay(Request $request){
        $this->validate($request,[
            'pay_sucursal' => 'required|integer|min:1',
            'pay_tipo' => 'required|integer|min:1',
            'pay_titulo' => 'required|string',
            'pay_cantidad' => 'required|integer|min:1'
        ]);
        \DB::table('sucursal_pago')
            ->insert([
                'id_tipo' => $request->input('pay_tipo'),
                'id_sucursal' => $request->input('pay_sucursal'),
                'titulo' => $request->input('pay_titulo'),
                'cantidad' => $request->input('pay_cantidad')
            ]);
        return redirect()->back();
    }

    public function get_pay(Request $request){
        if($request->ajax()){
            $data = \DB::table('sucursal_pago')->where('id_sucursal',$request->input('sucursal'))->get();
            echo json_encode($data);
        }
        else
            abort(405);
    }

    public function destroy_pay(Request $request){
        if($request->ajax()){
            echo \DB::table('sucursal_pago')->where('id_pago',$request->input('pago'))->delete();
        }
        else
            abort(405);
    }
}
