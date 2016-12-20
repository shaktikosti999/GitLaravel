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
    public function update(Request $request, $id)
    {        
        $padre = $request->input('padre');
        $titulo = trim($request->input('titulo'));
        $slug = trim($request->input('slug'));
        $contenido = $request->input('contenido');
        $menu_principal = trim($request->input('menu_principal'));
        $menu_inferior = trim($request->input('menu_inferior'));
        $orden = $request->input('orden');
        $link = trim($request->input('link'));
        $elimina_imagen = $request->input('eliminada');
        
        $pagina = \App\pagina_contenido::find($id);
        $img_principal_anterior = $pagina->archivo;
        $slug_anterior = $pagina->slug;
        $imagen_principal = "";

        if($request->hasFile('img_principal')){
            $archivo = $request->file('img_principal');
            $ext = strtolower($archivo->getClientOriginalExtension());
            $extValidas = ['jpg','jpeg','png'];

            if(in_array($ext, $extValidas)){  
                $carpeta = 'assets/img/paginas/';            
                if($img_principal_anterior != "")
                {                    
                    $elimina = File::delete(public_path(). $img_principal_anterior); //Elimina imagen anterior                    
                }else{
                    $elimina = 1;
                }
                if($elimina == 1)
                {
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
                        $imagen_principal = '/' . $carpeta . $nombre;                           
                    }
                }else{
                    return redirect(url('/administrador/pagina_de_contenido.html'))->with('error','Error al eliminar la imagen principal anterior');
                }
            }                    
        }
        else{

            if($elimina_imagen == 1)
            {                    
                $elimina = File::delete(public_path(). $img_principal_anterior); //Elimina imagen anterior  
                $imagen_principal = '';                  
            }else{
              $imagen_principal = $img_principal_anterior;
            }          
        }
        
        $data_pagina = array(
                              'id_padre' => $padre,
                              'titulo' => $titulo,
                              'slug' => $slug,  
                              'archivo' => $imagen_principal,  
                              'contenido' => $contenido,   
                              'menu_principal' => $menu_principal,
                              'menu_inferior' => $menu_inferior,
                              'link' => $link,
                              'orden' => $orden,
                              'updated_at' => date('Y-m-d H:i:s')
                          ); 

        $actualiza = pagina::actualiza($data_pagina, $id);            

        if($actualiza == 1){
            return redirect(url('/administrador/pagina_de_contenido.html'))->with('success','Pagina modificada correctamente');
        }
        else{
            return redirect(url('/administrador/pagina_de_contenido.html'))->with('error','Error al actualizar, vuelve a intentarlo');
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
