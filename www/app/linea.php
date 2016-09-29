<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linea extends Model{
	protected $table = 'linea';
    protected $fillable = ['nombre','archivo','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_linea';
}