<?php
//Hacer middleware para realizar la sesión o aumentar uno a la petición de deportes
//Hacer el controlador para que todos los archivos del mundo jalen al 100
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use SoapClient;
use SoapServer;

class soapController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/SignOn/SignOnSitio?wsdl');
        $res = $soap->__soapCall('SignOnSitioOp',[[
            'ip'=>'10.100.240.1',
            'idSitio'=>1
        ]]);


        // No regresa información 2
        $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/Deportes/ListaDeportes?wsdl&amp');
        $res2 = $soap->__soapCall('ListaDeportesOp',[[
            'sesion' => $res->sesion,
            'serieMensaje' => "1"
        ]]);

        // No regresa información 3
        $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/Deportes/ListaAgrupadoresDeportes?wsdl');
        $res3 = $soap->__soapCall('ListaAgrupadoresDeportesOp',[[
            'sesion' => $res->sesion,
            'serieMensaje' => 1,
            'numDeporte' => 5
        ]]);
        $ligas = $res3->deporte->ligas->liga;
        // print_r($ligas[0]->agrupadores->agrupador[0]->idAgrupador);

        // // regresa array con error de sesión 4
        $soap = new SoapClient('http://10.88.6.9:8080/ApuestaRemotaESB/ebws/Deportes/ListaEventosDeportes?wsdl');
        $res4 = $soap->__soapCall('ListaEventosDeportesOp',[[
            'sesion'=>$res->sesion,
            'numDeporte' => 5,
            'idAgrupador'=>'P670487',
            // 'idAgrupador'=>'P670487',
            'numLiga'=>1,
        ]]);

        // Prueba inicial
        dd($res,$res2,$res3,$res4);
        echo $this->exp_to_dec($res->sesion)."<br>";
        echo (int)$res->sesion;
        dd($res);

        echo '<pre>';
        echo '<h2>Types:</h2>';
        $types = $soap->__getTypes();
        foreach ($types as $type) {
            $type = preg_replace(
                array('/(\w+) ([a-zA-Z0-9]+)/', '/\n /'),
                array('<font color="green">${1}</font> <font color="blue">${2}</font>', "\n\t"),
                $type
            );
            echo $type;
            echo "\n\n";
        }
        echo '</pre>';
        dd($soap->__getFunctions());

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function serv()
    {
        $server = new SoapServer('http://casinocaliente.abardev.net/api/IAA.svc');
        dd($server);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
