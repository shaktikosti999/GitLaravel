<?php
namespace App\Models\front;
use App\contacto;
use App\newsletter;

class torneo_model{

    static function find_by_slug($slug){
        $get = \DB::table('torneo as t')
            ->select(
                't.titulo',
                't.descripcion',
                't.fecha',
                't.link',
                't.archivo',
                'tt.nombre as tipo'
            )
            ->join('tipo_torneo as tt','t.tipo_torneo','=','tt.id_tipo')
            ->where('slug',$slug)
            ->first();
        return $get;
    }
}