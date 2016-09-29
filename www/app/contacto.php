<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model{
    protected $table = 'contacto';
    protected $fillable = ['id_sucursal','tipo_mensaje','nombre','email','tarjeta','telefono','mensaje','promociones','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_contacto';
}