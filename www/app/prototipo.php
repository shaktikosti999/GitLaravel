<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prototipo extends Model{
	protected $table = 'prototipo';
    protected $fillable = ['id_desarrollo','nombre','descripcion','planta','descripcion_regular','descripcion_ampliado','precio','precio_max','descuento','folleto','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_prototipo';
}