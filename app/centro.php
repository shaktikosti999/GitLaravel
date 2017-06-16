<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class centro extends Model
{
    protected $table = 'centro';
    protected $fillable = ['id_desarrollo','nombre','direccion','latitud','longitud','como_llegar','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_centro';
}
