<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagina_contenido extends Model
{
    protected $table = 'pagina_contenido';
    protected $fillable = ['id_padre','titulo','slug','imagen_principal','contenido','menu_principal','menu_inferior','link','estatus','eliminado','created_at','updated_at'];
    protected $primaryKey = 'id_pagina';
}
