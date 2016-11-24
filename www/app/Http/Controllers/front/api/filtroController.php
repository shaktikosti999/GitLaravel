<?php

namespace App\Http\Controllers\front\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\linea_model as linea;
use App\Models\front\sucursal_model as sucursal;

class filtroController extends Controller
{
    public function filtro_maquinas(Request $request){
        if($request->ajax()){
            $id_categoria = $request->input('id_categoria');
            $slug_sucursal = $request->input('slug_sucursal'); 
            $slug_sucursal == -1 ? $slug_sucursal = null : $slug_sucursal = $slug_sucursal;
            $id_categoria == "" ? $id_categoria = null : $id_categoria = $id_categoria;

            if ($slug_sucursal == null) {
                $id_sucursal = null;
            }else{
                $suc = sucursal::get_sucursal($slug_sucursal);                     
                $id_sucursal = $suc[0]->id_sucursal;                       
            }   

            echo json_encode(linea::get_games( [ "linea" => 1, "id_sucursal" => $id_sucursal, "id_categoria" => $id_categoria ] ) );
        }
        else
        abort(403);
    }
}