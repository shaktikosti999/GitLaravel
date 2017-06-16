<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alimento extends Model{
    protected $table = 'alimento';
    protected $fillable = ['tipo_alimento','nombre','descripcion','archivo'];
    protected $primaryKey = 'id_alimento';
}