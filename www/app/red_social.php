<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class red_social extends Model{
    protected $table = 'red_social';
    protected $fillable = ['tipo','id_sucursal','link'];
    protected $primaryKey = 'id_red';
}