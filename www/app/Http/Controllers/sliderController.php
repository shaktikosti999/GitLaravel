<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\slider_model as slider;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = [
            'sliders' => slider::all()
        ];
        return view('back.slider.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('back.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'tipo' => 'required|integer|min:0',
            "titulo" => 'required|string|max:100|min:3',
            'subtitulo'=>'string',
            'texto' => 'string',
            "texto_boton" => 'required|string|max:100|min:2',
            "link" => 'string|max:100|min:3',
            "imagen" => 'required|image'
        ]);
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/slider/';
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

                    $evento = slider::store($request,$archivo);
                    $evento = $evento[0];
                    if(!$evento){
                        return redirect(url('/administrador/slider.html'))->with('success','Slider agregado correctamente');
                    }
                    else{
                        return redirect(url('/administrador/slider.html'))->with('error',$evento);
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
            'slider' => \App\slider::find($id)
        ];
        return view('back.slider.edit',$data);
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
            "titulo" => 'required|string|max:100|min:3',
            'subtitulo'=>'string',
            'texto' => 'string',
            "texto_boton" => 'required|string|max:100|min:2',
            "link" => 'string|max:100|min:3',
            "imagen" => 'image'
        ]);
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/slider/';
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
        $evento = slider::update($id,$request,$archivo);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/slider.html'))->with('success','Slider modificado correctamente');
        }
        else{
            return redirect(url('/administrador/slider.html'))->with('error',$evento);
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
