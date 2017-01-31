<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promocion extends Model{
    protected $table = 'promocion';
    protected $fillable =['id_juego','nombre','slug','resumen','imagen','thumb','descripcion','fecha_inicio','fecha_fin','created_at','updated_at'];
    protected $primaryKey = 'id_promocion';
}