<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multimedia extends Model{
	protected $table = 'multimedia';
    protected $fillable = ['id_tipo','direccion','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_multimedia';
}