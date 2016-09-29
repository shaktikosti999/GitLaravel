<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class juego extends Model{
	protected $table = 'juego';
    protected $fillable = ['id_linea','nombre','titulo','resumen','aprender','reglas','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_juego';
}