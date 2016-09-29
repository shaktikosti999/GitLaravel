<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucursal extends Model{
	protected $table = 'sucursal';
    protected $fillable = ['nombre','direccion','latitud','longitud','horario','instrucciones','telefono','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_sucursal';
}
