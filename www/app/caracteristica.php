<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristica extends Model{
    protected $table = 'caracteristica';
    protected $fillable = ['nombre','estatus','eliminado'];
    protected $primaryKey = 'id_caracteristica';
}
