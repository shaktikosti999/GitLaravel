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
            'sucursales' => \App\Models\sucursal_model::all(),
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
        'juegos' => \App\Models\linea_model::all()
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
            'juegos' => \App\Models\linea_model::all()
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

    /**
     * Get the relationship between branch and promotion
     *
     * 
     * @return JSOn
     */
    public function getPromos(Request $request){
        if(\Request::ajax()){
            $this->validate($request,[
                'promocion' => 'required|integer|min:1'
            ]);
            $data = promocion::get_promotions(['id_promocion' => $request->input('promocion')]);
            return json_encode($data);
        }
        else
            abort(503);
    }

    /**
     * Save the relationship between branch and promotion
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function addPromotion(Request $request){
        $this->validate($request,[
            "add_promocion" => 'required|integer|min:1',
            "add_sucursal" => 'required|integer|min:1',
            "add_desc" => 'string|min:10',
            "add_link" => "string",
            "add_archivo" => 'image'
        ]);
        if($request->hasFile('add_archivo')){
            $archivo = $request->file('add_archivo');
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
        if(promocion::addBranchPromotion($request,$archivo)){
            return redirect(url('/administrador/promocion.html'))->with('success','Promocion asignada correctamente');
        }
        else{
            return redirect(url('/administrador/promocion.html'))->with('error','No fue posible agregar la información en este momento');
        }
    }

     /**
     * Get the relationship detail between branch and promotion
     *
     * 
     * @return JSOn
     */
    public function getPromoDetail(Request $request){
        if(\Request::ajax()){
            $this->validate($request,[
                'promocion' => 'required|integer|min:1',
                'sucursal' => 'required|integer|min:1'
            ]);
            $data = promocion::get_promotions(['id_promocion' => $request->input('promocion'),'id_sucursal' => $request->input('sucursal')]);
            return json_encode($data);
        }
        else
            abort(503);
    }

    public function editPromotion(Request $request){
        $this->validate($request,[
            "add_promocion" => 'required|integer|min:1',
            "add_sucursal" => 'required|integer|min:1',
            "add_desc" => 'required|string|min:10',
            "add_link" => "required|string",
            "add_archivo" => 'image'
        ]);
        if($request->hasFile('add_archivo')){
            $archivo = $request->file('add_archivo');
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
        if(promocion::updateBranchPromotion($request,$archivo)){
            return redirect(url('/administrador/promocion.html'))->with('success','Promocion modificada correctamente');
        }
        else{
            return redirect(url('/administrador/promocion.html'))->with('error','No fue posible agregar la información en este momento');
        }
    }

    public function destroyPromotion(Request $request){
        if( $request->ajax() ){
            $this->validate($request,[
                "id_promocion" => 'required|integer|min:1',
                "id_sucursal" => 'required|integer|min:1',
            ]);
            if(!promocion::destroy_promotion($request->input('id_promocion'),$request->input('id_sucursal')))
                abort(404);
        }
        else
            abort(503);
    }

}