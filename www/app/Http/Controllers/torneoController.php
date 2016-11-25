<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\torneo_model as torneo;

class torneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $torneo = torneo::all();
        $torneos = [];

        foreach($torneo as $val)
            $torneos[$val->id_sucursal][] = $val;

        $data = [
            'torneos' => $torneos
        ];

        return view('back.torneo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
            'tipos' => torneo::get_tournament_types(),
            'sucursales' =>\App\Models\sucursal_model::all()
        ];
        return view('back.torneo.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            "titulo" => 'required|string',
            "slug" => 'required|string',
            "tipo" => 'required|integer|min:1',
            "sucursal" => 'required|integer|min:1',
            "descripcion" => 'required|string',
            "fecha" => 'required|date|after:tomorrow',
            "link" => 'string|url',
            "archivo" => 'required|image'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/torneo/' . $request->input('sucursal') . '/';
                if(!file_exists(public_path() . '/' . $carpeta))
                    mkdir(public_path() . '/' . $carpeta,0777,true);
                do{
                    $nombre = str_replace("/", "-", $request->input('fecha')) . '_';
                    $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                    for($i=0; $i<=6; $i++ ){
                        $nombre .= substr($str, rand(0,strlen($str)-1) ,1 );
                    }
                }while(file_exists(public_path() . '/' . $carpeta . $nombre . '.' . $ext));
                $nombre .= '.' . $ext;
                if($archivo->move(public_path() . '/' . $carpeta , $nombre)){
                    $archivo = '/' . $carpeta . $nombre;

                    $evento = torneo::store($request,$archivo);
                    $evento = $evento[0];
                    if(!$evento){
                        return redirect(url('/administrador/torneo.html'))->with('success','Torneo registrado');
                    }
                    else{
                        return redirect(url('/administrador/torneo.html'))->with('error',$evento);
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
            'torneo' => \App\torneo::find($id),
            'tipos' => torneo::get_tournament_types(),
            'sucursales' =>\App\Models\sucursal_model::all()
        ];
        return view('back.torneo.edit',$data);
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
            "titulo" => 'required|string',
            "slug" => 'required|string',
            "tipo" => 'required|integer|min:1',
            "sucursal" => 'required|integer|min:1',
            "descripcion" => 'required|string',
            "fecha" => 'required|date|after:tomorrow',
            "link" => 'string|url',
            "archivo" => 'image'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/torneo/' . $request->input('sucursal') . '/';
                if(!file_exists(public_path() . '/' . $carpeta))
                    mkdir(public_path() . '/' . $carpeta,0777,true);
                do{
                    $nombre = str_replace("/", "-", $request->input('fecha')) . '_';
                    $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                    for($i=0; $i<=6; $i++ ){
                        $nombre .= substr($str, rand(0,strlen($str)-1) ,1 );
                    }
                }while(file_exists(public_path() . '/' . $carpeta . $nombre . '.' . $ext));
                $nombre .= '.' . $ext;
                if($archivo->move(public_path() . '/' . $carpeta , $nombre)){
                    $archivo = '/' . $carpeta . $nombre;
                }
            }                    
        }
        if( isset($archivo) )
            $evento = torneo::update($id,$request,$archivo);
        else
            $evento = torneo::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/torneo.html'))->with('success','Torneo modificado correctamente');
        }
        else{
            return redirect(url('/administrador/torneo.html'))->with('error',$evento);
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
