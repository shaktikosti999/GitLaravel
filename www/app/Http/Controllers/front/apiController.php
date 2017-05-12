<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\front\index_model as index;
use App\Models\front\api_model as api;


class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Ubicaciones(){
		$data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] =  \DB::table('sucursal')->join('ciudad', 'sucursal.id_ciudad', '=', 'ciudad.id_ciudad')->select("sucursal.id_sucursal as id","sucursal.nombre","sucursal.nombre as ciudad","sucursal.direccion","sucursal.telefono","sucursal.oferta","sucursal.latitud","sucursal.longitud")->get();
        return ($data);
    }

    public function Promociones($id){
        $data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] = \DB::table('promocion as p')->select("id_promocion","nombre","slug","resumen","imagen","thumb","descripcion","fecha_inicio","fecha_fin")->where('p.id_promocion','=',$id)->get();
        return $data;
    }

    public function CalienteClub(){
        $data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] = htmlspecialchars(json_encode( \DB::table('contenido_simple')->select("titulo","slug","contenido")->get()));
        return ($data);
    }

    public function JuegoResponsable(){
        $data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] = htmlspecialchars(json_encode( \DB::table('contenido_simple')->select("contenido")->get()));
        return ($data);
    }

    public function AvisoPrivacidad(){
        $data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] = \DB::table('mail_aviso')->select("mail")->get();
        return ($data);
    }
	
	  public function QuienesSomos(){
        $data['Sstatus']='true';
        $data['code']=200;
        $data['message']='Test';
        $data['data'] = \DB::table('contacto')->select("*")->get();
        return ($data);
    }

    public function index(){
        
        $data = [];

        $data["promociones"]    = promocion::find_all( [ 'limit' => 4 ] );
        $data["slider"]         = slider::find_all();
        $data["lineas"]         = linea::find_all();
        $data["rand_sucursal"]  = sucursal::find_random();
        $data["sucursales"]     = sucursal::find_all();
        $data["ciudades"]       = ciudad::find_all(['lista'=>true]);
        $data["footer_text"]    = \DB::table('text_footer')->where('id',1)->first();

        // dd($data);

        return view('front.index',$data);
    
    }
}
