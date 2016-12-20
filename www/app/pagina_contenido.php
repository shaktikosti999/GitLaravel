<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagina_contenido extends Model
{
    protected $table = 'contenido_simple';
    protected $fillable = ['id_padre','titulo','slug','archivo','orden','contenido','estatus','eliminado','menu_principal','menu_inferior','link','created_at','updated_at'];
    protected $primaryKey = 'id_contenido';
}
