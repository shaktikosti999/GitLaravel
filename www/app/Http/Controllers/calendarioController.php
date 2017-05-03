<?php

namespace App\Http\Controllers;

use App\Events\dotask;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\calendario_model as calendario;
use Psy\Util\Json;

class calendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categorias = calendario::all();
        if( count($categorias) ){
            foreach($categorias as $item){
                $data[$item->id_sucursal][] = $item;
            }
        }
        else
            $data = [];
        $data = [
            'categorias' => $data
        ];
        // dd($data);
        return view('back.calendario.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
            'sucursales' => \App\Models\sucursal_model::all(),
            'categorias' => calendario::get_categories()
        ];
        return view('back.calendario.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            "titulo" => "required|string",
            "descripcion" => "string",
            "categoria" => "int|min:0",
            "categoria_txt" => "string",
            "sucursal" => "required|int",
            "fecha" => "date"
        ]);
        $categoria = (int)trim($request->input('categoria')) > 0 ? trim($request->input('categoria')) : trim($request->input('categoria_txt'));
        if( $categoria != "" ){
            $evento = calendario::store($request,$categoria);
            $evento = $evento[0];
            if(!$evento){
                return redirect(url('/administrador/calendario.html'))->with('success','Dinámica agregada correctamente');
            }
            else{
                return redirect(url('/administrador/calendario.html'))->with('error',$evento);
            }
        }

    }

    public function storeSlider(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'id_sucursal' => 'integer|min:1',
            'titulo' => 'string',
            'archivo' => 'image',
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/img/calendario/slider/';
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
                    $insert = \DB::table('calendario_slider')
                        ->insert([
                            'id_sucursal'=>$request->input('id_sucursal'),
                            'titulo'=>$request->input('titulo'),
                            'imagen'=>$carpeta . $nombre
                        ]);
                    if($insert)
                        return redirect(url('/administrador/calendario.html'))->with('success','Dinámica agregada correctamente');
                }
            }
        }
        if( $request->input('titulo_imagen') !== null && is_array($request->input('titulo_imagen')) ){
            foreach($request->input('titulo_imagen') as $key => $val){
                calendario::update_slider($key,$val);
            }
        }
        if( $request->input('delete') !== null && is_array($request->input('delete')) ){
            calendario::delete_slider($request->input('delete'));
        }
        return redirect(url('/administrador/calendario.html'));
    }

    public function getSlider(Request $request){
        $this->validate($request,['id'=>'required|integer|min:1']);
        if( $request->ajax() ){
            $data = calendario::slider($request->input('id'));
            echo json_encode($data);
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
            'calendario' => \App\calendario::find($id),
            'sucursales' => \App\Models\sucursal_model::all(),
            'categorias' => calendario::get_categories()
        ];
        return view('back.calendario.edit',$data);
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
            "titulo" => "required|string",
            "descripcion" => "string",
            "categoria" => "int|min:1",
            "categoria_txt" => "string",
            "sucursal" => "required|int",
            "fecha" => "date"
        ]);
        $categoria = (int)trim($request->input('categoria')) > 0 ? trim($request->input('categoria')) : trim($request->input('categoria_txt'));
        if( $categoria != "" ){
            $evento = calendario::update($id,$request,$categoria);
            $evento = $evento[0];
            if(!$evento){
                return redirect(url('/administrador/calendario.html'))->with('success','Dinámica modificada correctamente');
            }
            else{
                return redirect(url('/administrador/calendario.html'))->with('error',$evento);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}

    public function importCSV(){

        Excel::load(Input::file('fileImportCSV'),function ($reader){
            $reader->each(function ($sheet){

                
                calendario::importCSVData($sheet->toArray());
            });
        });
        return redirect(url('/administrador/calendario.html'))->with('success','File has been updated in DB');
    }
}
