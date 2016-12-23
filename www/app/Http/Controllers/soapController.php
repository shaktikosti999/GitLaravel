<?php

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
        $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/SignOn/SignOnSitio?wsdl&amp');
        $res = $soap->__soapCall('SignOnSitioOp',[[
            'ip'=>'10.100.240.2',
            'idSitio'=>1
        ]]);

        // // regresa array con error de sesión 4
        // $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaEventosDeportes?wsdl');
        // $res2 = $soap->__soapCall('ListaEventosDeportesOp',[[
        //     'numDeporte'=>$res->sesion,
        //     'numLiga'=>$res->sesion,
        //     'idAgrupador'=>$res->sesion
        // ]]);

        // No regresa información 2
        $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaDeportes?wsdl&amp');
        // $res2 = $soap->__soapCall('ListaDeportesOp',['listaDeportesType']);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[['listaDeportesType']]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',['listaDeportesType'=>1]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[['listaDeportesType']]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[['listaDeportesType'=>1]]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[1]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[[1]]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[]);
        // $res2 = $soap->__soapCall('ListaDeportesOp',[[]]);
        // $res2 = $soap->__soapCall('ListaDeportesOp');

        // No regresa información 3
        // $soap = new SoapClient('http://10.70.251.28:8080/ApuestaRemotaESB/ebws/Deportes/ListaAgrupadoresDeportes?wsdl');
        // $res2 = $soap->__soapCall('ListaAgrupadoresDeportesOp',[
        //     'numDeporte'=>1
        // ]);

        // Prueba inicial
        // dd($res);

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
