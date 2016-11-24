<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\alimento_model as alimento;

class alimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $alimento = new alimento;
        $data = array(
            'alimentos' => alimento::all()
        );
        return view('back.alimento.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = array(
            'tipo_alimento' => alimento::get_food_type()
        );
        if($data['tipo_alimento'] !== false)
            return view('back.alimento.create',$data);
        abort(404);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required|string|max:100|min:3',
            'tipo_alimento' => 'required|integer|min:1|max:9',
            'descripcion' => 'string',
            'archivo' => 'required|image'
        ]);

        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/alimentos/';
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

                    $evento = alimento::store($request,$archivo);
                    $evento = $evento[0];
                    if(!$evento){
                        return redirect(url('/administrador/alimento.html'))->with('success','Alimento agregado correctamente');
                    }
                    else{
                        return redirect(url('/administrador/alimento.html'))->with('error',$evento);
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
        $data = array(
            'id' => $id,
            'alimento' => alimento::find($id),
            'tipo_alimento' => alimento::get_food_type()
        );
        // dd($data);
        if($data['alimento'] !== null)
            return view('back.alimento.edit',$data);
        else
            abort(404);
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
            'nombre' => 'required|string|max:100|min:3',
            'tipo_alimento' => 'required|integer|min:1|max:9',
            'descripcion' => 'string',
            'archivo' => 'image'
        ]);

        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/images/alimentos/';
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
                    $eliminar = alimento::get_file_name($id);
                    if($eliminar !== false){
                        $eliminar = public_path() . $eliminar;
                        if(file_exists($eliminar) && is_file($eliminar)){
                            unlink($eliminar);
                        }
                    }
                }
            }
        }
        if( isset($archivo) )
            $evento = alimento::update($id,$request,$archivo);
        else
            $evento = alimento::update($id,$request);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/alimento.html'))->with('success','Alimento modificado correctamente');
        }
        else{
            return redirect(url('/administrador/alimento.html'))->with('error',$evento);
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
