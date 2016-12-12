<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model{
    protected $table = 'slider';
    protected $fillable = ['tipo','titulo','subtitulo','texto','imagen','texto_boton','link','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id';
}