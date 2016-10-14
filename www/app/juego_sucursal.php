<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class juego_sucursal extends Model{
	protected $table = 'juego_sucursal';
    protected $fillable = ['id_juego','id_sucursal','descripcion','archivo','disponibles','acumulado','apuesta_minima','link','estatus','created_at','updated_at'];
    protected $primaryKey = null;
}

