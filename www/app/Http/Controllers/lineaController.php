<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\linea_model as linea;

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
}
