<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metatag extends Model{
	protected $table = 'metatag';
    protected $fillable = ['nombre'];
    protected $primaryKey = 'id_metatag';
    public $timestamps = false;
}