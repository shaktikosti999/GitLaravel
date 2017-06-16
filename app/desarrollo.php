<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desarrollo extends Model{
    protected $table = 'desarrollo';
    protected $fillable = ['id_estado','id_region','nombre','descripcion','sembrados','como_llegar','folleto','imagen_principal','longitud','latitud','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_desarrollo';
}