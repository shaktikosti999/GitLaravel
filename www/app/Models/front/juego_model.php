<?php
namespace App\Models\front;

class juego_model{

    static function find($args = []){
        $get = \DB::table('juego as j');
        $get = isset($args['slug']) ? $get->where('slug',$args['slug']) : $get;
        $get = $get->first();
        return $get;
    }

}