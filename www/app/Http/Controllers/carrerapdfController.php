<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\carrerapdf_model as carrera;

class carrerapdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $carrera = carrera::all();
        $carreras = [];
        foreach($carrera as $val)
            $carreras[$val->id_sucursal][] = $val;

        $data = [
            'carreras' => $carreras
        ];
        return view('back.carrerapdf.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
            'juegos' => \App\Models\juego_model::all(['id_linea'=>4]),
            'sucursales' => \App\Models\sucursal_model::all(),
        ];
        // dd($data);
        return view('back.carrerapdf.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'titulo' => 'required|string',
            'juego' => 'required|integer',
            'sucursal' => 'required|integer',
            'fecha' => 'required|date|after:tomorrow',
            'archivo' => 'required|mimes:pdf'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['pdf'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/carreras/' . $request->input('sucursal') . '/' . $request->input('juego') . '/';
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

                    $evento = carrera::store($request,$archivo);
                    $evento = $evento[0];
                    if(!$evento){
                        return redirect(url('/administrador/pdfcarrera.html'))->with('success','Archivo guardado correctamente');
                    }
                    else{
                        return redirect(url('/administrador/pdfcarrera.html'))->with('error',$evento);
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
            'id'=>$id,
            'carrera' => carrera::find($id),
            'juegos' => \App\Models\juego_model::all(['id_linea'=>4]),
            'sucursales' => \App\Models\sucursal_model::all(),
        ];
        return view('back.carrerapdf.edit',$data);
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
            'titulo' => 'required|string',
            'juego' => 'required|integer',
            'sucursal' => 'required|integer',
            'fecha' => 'required|date',
            'archivo' => 'mimes:pdf'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['pdf'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/carreras/' . $request->input('sucursal') . '/' . $request->input('juego') . '/';
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
            $evento = carrera::update($id,$request,$archivo);
        else
            $evento = carrera::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/pdfcarrera.html'))->with('success','Archivo modificado correctamente');
        }
        else{
            return redirect(url('/administrador/pdfcarrera.html'))->with('error',$evento);
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
