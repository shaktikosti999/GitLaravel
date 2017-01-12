<?php
namespace App\Models\front;

class calendario_model{
    static function find($args = []){
        $data = \DB::table('calendario_pago as p');
        if( isset($args['slug']) && !empty($args['slug']) ){
            $data = $data
                ->join('sucursal as s','s.id_sucursal','=','p.id_sucursal')
                ->where('s.slug',$args['slug']);
        }
        $data = $data
            ->where('p.eliminado',0)
            ->get();
        return $data;
    }

    static function slider($args = []){
        $data = \DB::table('calendario_slider as p')
            ->select(
                'titulo',
                'imagen'
            );
        if( isset($args['slug']) && !empty($args['slug']) ){
            $data = $data
                ->join('sucursal as s','s.id_sucursal','=','p.id_sucursal')
                ->where('s.slug',$args['slug']);
        }
        $data = $data
            ->get();
        return $data;
    }
}