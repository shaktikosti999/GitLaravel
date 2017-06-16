<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\slider_model as slider;
use App\Models\front\sucursal_model as sucursal;


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

        $sliderData = [
            'juegos' => \App\Models\linea_model::all(),
        ];

        $index = 0;
        foreach($sliderData['juegos'] as $value){
            //$sliderData['sucursales'][$index] = sucursal::find_all(['linea_id_linea' => $value->id]);
            $sliderData['sucursales'][$index] = [];
            if($value->id != '7' && $value->id != '8' && $value->id != '11' && $value->id != '12') {
                $sliderData['sucursales'][$index] = \DB::table('sucursal')->orderby('nombre')->get();
            }
            $index++;

        }

        return view('back.slider.create',$sliderData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if ($request->input('showImageVideo')  == "showImage") {
            $this->validate($request,[
                // 'tipo' => 'required|integer|min:0',
//            "titulo" => 'required|string|max:100|min:3',
//            'subtitulo'=>'string',
//            'texto' => 'string',
                //"texto_boton" => 'required|string|max:100|min:2',
//            "link" => 'string|max:100|min:3',
                "imagen" => 'required|image'
            ]);
        } else {
            $this->validate($request,[
                // 'tipo' => 'required|integer|min:0',
//            "titulo" => 'required|string|max:100|min:3',
//            'subtitulo'=>'string',
//            'texto' => 'string',
                //"texto_boton" => 'required|string|max:100|min:2',
//            "link" => 'string|max:100|min:3',
                "video_url" => 'required'
            ]);
        }
        //dd($request->all());
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
        } else {
//            dd($request->all());
            $evento = slider::store($request,"");
            if(!$evento){
                return redirect(url('/administrador/slider.html'))->with('success','Slider agregado correctamente');
            }
            else{
                return redirect(url('/administrador/slider.html'))->with('error',$evento);
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

        $sliderData = [
            'id' => $id,
            'slider' => \App\slider::find($id),
            'juegos' => \App\Models\linea_model::all()
        ];

        $index = 0;
        foreach($sliderData['juegos'] as $value){
           // $sliderData['sucursales'][$index] = sucursal::find_all(['linea_id_linea' => $value->id]);
            $sliderData['sucursales'][$index] = [];
            if($value->id != '7' && $value->id != '8' && $value->id != '11' && $value->id != '12') {
                $sliderData['sucursales'][$index] = \DB::table('sucursal')->orderby('nombre')->get();
            }
            $index++;
        }

        $branchIds = \DB::select('select id,tipo,isParentShow from slider where branch_group_id = (SELECT branch_group_id FROM slider where id ='.$id.')');

        $linea = array();
        foreach ($branchIds as $value) {
            $temp = \DB::select('select * from slider_sucursal where id_slider ='.$value->id);
            if ( $value->isParentShow == 1 ){
                $linea[] = $value->tipo;
            }
            foreach($temp as $value1){
                $sliderData['selectedSucursales'][$value->tipo][] = $value1->id_sucursal;
            }
        }

        $sliderData['linea'] = $linea;
//        dd($sliderData);
        return view('back.slider.edit',$sliderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
//        dd($request->all());
        $this->validate($request,[
//            "titulo" => 'required|string|max:100|min:3',
            'subtitulo'=>'string',
            'texto' => 'string',
//            "texto_boton" => 'required|string|max:100|min:2',
//            "link" => 'string|max:100|min:3',
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
