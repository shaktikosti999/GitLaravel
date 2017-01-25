<?php
namespace App\Models\front;

class calendario_model{
    static function find($args = []){
        $data = \DB::table('calendario_pago as p')
            ->select(
                'c.nombre as categoria',
                'c.id_categoria',
                's.nombre as sucursal',
                'p.titulo',
                'p.descripcion',
                'p.inicio',
                'p.fin'
            )
            ->join('sucursal as s','s.id_sucursal','=','p.id_sucursal')
            ->join('calendario_categoria as c','c.id_categoria','=','p.id_categoria')
            ->where('p.estatus',1)
            ->where('p.eliminado',0)
            ->orderBy('c.nombre')
            ->orderBy('p.inicio','DESC');
        if( isset($args['slug']) && !empty($args['slug']) ){
            $data = $data
                ->where('s.slug',$args['slug']);
        }

        if( isset($args['categoria']) && !empty($args['categoria']) ){
            $data = $data
                ->where('p.id_categoria',$args['categoria']);
        }

        $data = $data
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