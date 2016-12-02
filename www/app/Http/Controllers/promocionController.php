<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\promocion_model as promocion;

class promocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = [
            'promociones' => promocion::all()
        ];

        return view('back.promocion.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
        'juegos' => \App\Models\juego_model::all()
        ];
        return view('back.promocion.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            "nombre" => 'required|string',
            "juego" => 'required|integer|min:1',
            "slug" => 'required|string',
            "resumen" => 'required|string',
            "descripcion" => 'required|string',
            "imagen" => 'required|image'
        ]);
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/promociones/';
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

                    $evento = promocion::store($request,$archivo);
                    $evento = $evento[0];
                    if(!$evento){
                        return redirect(url('/administrador/promocion.html'))->with('success','Promocion agregada correctamente');
                    }
                    else{
                        return redirect(url('/administrador/promocion.html'))->with('error',$evento);
                    }
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
        $data = [
            'id' => $id,
            'promocion' => \App\promocion::find($id),
            'juegos' => \App\Models\juego_model::all()
        ];
        return view('back.promocion.edit',$data);
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
            "nombre" => 'required|string',
            "juego" => 'required|integer|min:1',
            "slug" => 'required|string',
            "resumen" => 'required|string',
            "descripcion" => 'required|string',
            "imagen" => 'image'
        ]);
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/promociones/';
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
        $evento = promocion::update($id,$request,$archivo);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/promocion.html'))->with('success','Promocion modificada correctamente');
        }
        else{
            return redirect(url('/administrador/promocion.html'))->with('error',$evento);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
