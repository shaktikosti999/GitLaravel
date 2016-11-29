<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class torneo extends Model{
    protected $table = 'torneo';
    protected $fillable = ['id_sucursal','id_juego','tipo_torneo','titulo','slug','descripcion','fecha_inicio','fecha_fin','archivo','link','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_torneo';
}