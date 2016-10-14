<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class centro_telefono extends Model
{
    protected $table = 'centro_telefono';
    protected $fillable = ['id_centro','telefono','created_at','updated_at'];
}
