<?php

namespace App\Http\Controllers;

use App\Events\dotask;
use Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\pagina_contenido;
use Illuminate\Support\Str;
use File;

use App\Models\pagina_model as pagina;

class paginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = pagina::all();

        $pagina = [];
        foreach ($paginas as $value) { //Guarda las páginas Padres
            if ($value->id_padre == 0) {                
               $pagina[$value->id] = (array)$value;  
            }            
        }
        foreach ($paginas as $value) { //Guarda las páginas Hijas
            if ($value->id_padre != 0) {
                $pagina[$value->id_padre][] = (array)$value; 
            }          
        }  
        $data['contenido'] = $pagina;    
        return view('back.pagina_contenido.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = array(
            'paginas' => pagina::get_padres()
        );
        return view('back.pagina_contenido.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $archivo = '';

        if($request->hasFile('img_principal')){ //Guarda la imagen principal
            $archivo = $request->file('img_principal');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){
                $carpeta = 'assets/img/paginas/';
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

        $evento = pagina::store($request,$archivo);
        $evento = $evento[0];
        if(!$evento){
            return redirect(url('/administrador/pagina_de_contenido.html'))->with('success','Pagina agregada correctamente');
        }
        else{
            return redirect(url('/administrador/pagina_de_contenido.html'))->with('error',$evento);
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $pagina = pagina::show($id);
        ?>
        <h5>Título: <small><?php echo $pagina->titulo; ?></small></h5>
        <h5>Padre: <small><?php echo $pagina->titulo_padre; ?></small></h5>
        <h5>Link: <small><?php echo $pagina->link; ?></small></h5>
        <h5>Orden: <small><?php echo $pagina->orden; ?></small></h5>
        <?php echo $pagina->menu_principal == 1 ? '<h5>Menu principal</h5>' : '<h5></h5>';?>
        <?php echo $pagina->menu_inferior == 1 ? '<h5>Menu inferior</h5>' : '<h5></h5>';?>
        <?php echo $pagina->estatus == 1 ? '<h5>Activo</h5>' : '<h5>Inactivo</h5>';?>
        <?php echo $pagina->eliminado == 1 ? '<h5 class="text-center alert-danger">Eliminado</h5>' : ''; ?>
        <?php
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'paginas' => pagina::paginas($id),
            'pagina' => pagina::edit($id)
        );
        return view('back.pagina_contenido.edit',$data);
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
          "eliminada" => "required|int",
          "contenido" => "required|string",
          "slug" => "required|string"
      ]);
      // dd($request->all());
      if($request->hasFile('img_principal')){
          $archivo = $request->file('img_principal');
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

              }
          }                    
      }
      else
        $archivo = null;
      $evento = pagina::actualiza($id,$request,$archivo);
      $evento = $evento[0];
      if(!$evento){
          return redirect(url('/administrador/pagina_de_contenido.html'))->with('success','Página modificada correctamente');
      }
      else{
          return redirect(url('/administrador/pagina_de_contenido.html'))->with('error',$evento);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    
}
