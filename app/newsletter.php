<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsletter extends Model{
	protected $table = 'newsletter';
    protected $fillable = ['id_sucursal','telefono','nombre','mail','estatus','created_at','updated_at'];
    protected $primaryKey = 'id_newsletter';
}