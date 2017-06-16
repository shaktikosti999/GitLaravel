<?php
namespace App\Models\front;

class juego_model{

    static function find($args = []){
        $get = \DB::table('juego as j');
        $get = isset($args['slug']) ? $get->where('slug',$args['slug']) : $get;
        $get = $get->first();
        return $get;
    }

    static function id_by_slug($slug){
    	$data = \DB::table('juego as j')
    		->select('id_juego as id')
    		->where('slug',$slug)
    		->first();
    	return isset( $data->id ) ? $data->id : null;
    }

}