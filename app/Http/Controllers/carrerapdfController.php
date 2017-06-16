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
        $data = [
            'carreras' => carrera::all()
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
            // 'sucursal' => 'integer',
            'fecha' => 'required|date',
            'archivo' => 'required|mimes:pdf'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['pdf'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/carreras/' . $request->input('juego') . '/';
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

    public function storemassive(Request $request){
        // dd($_FILES);


        $carpeta = 'assets/carreras/';
        // dd(public_path() . '/' . $carpeta);
        if(!file_exists(public_path() . '/' . $carpeta)) {
            mkdir(public_path() . '/' . $carpeta, 0777, true);
        }

        $timestamp='';//time();

        if( $request->hasFile('pdf') ){
            for($i=0;$i<count($_FILES['pdf']['name']);$i++) {
                move_uploaded_file($_FILES['pdf']['tmp_name'][$i] , public_path() . '/' . $carpeta . '/' .$timestamp.$_FILES['pdf']['name'][$i]);
            }
        }

        if( $request->hasFile('csv') ){ 
            $fp = fopen($_FILES['csv']['tmp_name'],'r');
            fgetcsv($fp);
            $data = [];
            $branchs = [];
            $k=0;
            while(!feof($fp)){
                $txt = fgetcsv($fp);

                if(count($txt)!=1) {
                    $data[] = [
                        'id_juego' => $txt[1],
                        'titulo' => $txt[0],
                        'fecha' => date('Y-m-d', strtotime($txt[2])),
                        'archivo' => '/assets/carreras/' . $timestamp . $txt[3],
                        'estatus' => 1,
                        'eliminado' => 0,
                        'updated_at' => date('Y-m-d'),
                        'created_at' => date('Y-m-d')
                    ];

                    // $branch = [];
                    // for($j=4;$j<count($txt);$j++){
                    //     if($txt[$j]!=""){
                    //         $branch[] = $txt[$j];
                    //     }
                    // }

                    // $branchs[$k] = $branch;
                    // $k++;
                }
            }

            if( count($data) ){
                $save = \DB::table('carrerapdf')
                    ->insert($data);
                if( $save ){
                    $limit = count($data);
                    $ids = \DB::table('carrerapdf')
                        ->select('id_carrerapdf as id')
                        ->orderBy('id_carrerapdf','DESC')
                        ->limit($limit)
                        ->get();

                    // Método con todas las sucursales
                    if( count($ids) ){
                        $sucursales = \App\Models\sucursal_model::all();

                        if( count($sucursales) ){
                            $data = [];
                            foreach($ids as $carrera){
                                foreach($sucursales as $sucursal){
                                    $data[] = [
                                        'id_carrera' => $carrera->id,
                                        'id_sucursal' => $sucursal->id
                                    ];
                                }
                            }
                            \DB::table('carrera_sucursal')->insert($data);
                        }
                    }


                    // Método para sucursales seleccionadas
                    // $data = [];
                    // for($i=0;$i<count($branchs);$i++){
                    //     for($j=0;$j<count($branchs[$i]);$j++) {
                    //         $branchId = array('id_carrera' => $ids[$i]->id,'id_sucursal' => $branchs[$i][$j]);

                    //         $data[] =  $branchId;
                    //     }
                    // }
                    // \DB::table('carrera_sucursal')->insert($data);

                }
            }
        }
        return redirect('/administrador/pdfcarrera.html');
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
        $sc = carrera::find_suc($id);
        $suc=[];
        foreach($sc as $item){
            $suc[] = $item->id_sucursal;
        }

        $data = [
            'id'=>$id,
            'carrera' => carrera::find($id),
            'juegos' => \App\Models\juego_model::all(['id_linea'=>4]),
            'sucursales' => \App\Models\sucursal_model::all(),
            'sucursales_carrera' => $suc
        ];
        // dd($data);
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
            // 'sucursal' => 'integer',
            'fecha' => 'required|date',
            'archivo' => 'mimes:pdf'
        ]);
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['pdf'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/carreras/' . $request->input('juego') . '/';
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
