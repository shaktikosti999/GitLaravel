<?php
namespace App\Models\front;

class search_model{
    static function all($q){
        $data = [
            'sucursales' => \DB::table('sucursal')
                ->where('nombre','like','%' . $q . '%')
                ->get(),
            'lineas' => \DB::table('linea')
                ->where('nombre','like','%' . $q . '%')
                ->get(),
            'promociones' => \DB::table('promocion')
                ->where('nombre','like','%' . $q . '%')
                ->orWhere('descripcion','like','%' . $q . '%')
                ->get(),
            'alimentos' => \DB::table('alimento')
                ->where('nombre','like','%' . $q . '%')
                ->orWhere('descripcion','like','%' . $q . '%')
                ->get(),
        ];
        return $data;
    }
}