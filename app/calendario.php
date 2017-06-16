<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calendario extends Model{
    protected $table = 'calendario_pago';
    protected $fillable = ['id_pago','id_categoria','titulo','descripcion','inicio','fin','created_at','updated_at'];
    protected $primaryKey = 'id_pago';
}
