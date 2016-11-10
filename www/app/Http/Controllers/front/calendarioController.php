<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class calendarioController extends Controller
{
    /**
     * Muestra las fechas en un calendario.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(){
        return view('front.calendario.show');
        //
    }

}