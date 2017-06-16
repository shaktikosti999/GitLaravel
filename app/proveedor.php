<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model{
    protected $table = 'proveedor';
    protected $fillable = ['nombre','archivo','link','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_proveedor';
}

