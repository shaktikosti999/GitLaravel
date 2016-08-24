<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\sesion;

class loginController extends Controller{
    
    public function index(Request $request){
        if(Auth::check()){
            if(Auth::user()->id_rol == 1) { 
                return "HOLA";
                // return redirect('/administrador');
            }
            return redirect('/administrador');
        }
        return view('back.login.index');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $rem = trim($request->input('remember')) != "" ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$rem)) {
            // if (Auth::user()->id_rol == 1 ) {
                $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $token = "";
                for( $i=0; $i<32; $i++ ){
                    $token .= substr($str, rand(0,strlen($str)-1),1);
                }
                $sesion = new sesion;
                $sesion->id_usuario = Auth::user()->id_usuario;
                $sesion->token = $token;
                $sesion->ip = $request->ip();
                if($sesion->save()){
                    $data = array(
                        'psw' => $token,
                        'idsesion_log' => $sesion->id_sesion,
                        'rol' => Auth::user()->id_rol,
                    );
                    $data['desarrollo'] = (Auth::user()->id_desarrollo > 0 && Auth::user()->id_rol == 3) ? Auth::user()->id_desarrollo : null;
                    session($data);
                    return redirect(url('/administrador'));
                }
                else{
                    Auth::logout();
                    return back();
                }
            // } 
            // return "Cliente";
        }
        return back();

    }

    public function destroy()
    {
        \Auth::logout();
        session()->flush();
        return redirect('/login.html');
    }
}
