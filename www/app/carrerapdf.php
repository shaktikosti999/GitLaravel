<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrerapdf extends Model{
    protected $table = 'carrerapdf';
    protected $fillable = ['id_sucursal','id_juego','titulo','fecha','archivo','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_carrerapdf';
    public $timestamp = false;
}

