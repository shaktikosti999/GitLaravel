<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizador extends Model
{
    protected $table = 'cotizador';
    protected $fillable = ['nombre','apellido','rfc','edad','telefono','email','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_cotizador';
}
