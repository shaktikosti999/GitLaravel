<?php
namespace App\Models;
use App\seccion;
class seccion{
	static function all(){
		$seccion = \DB::table('sys_seccion as s')->get();
		return $seccion;
	}
};
