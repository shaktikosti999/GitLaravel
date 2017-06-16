<?php
namespace App\Models\front;

class promocion_model{

    static function find_all( $parameters = [] ){

//        dd($parameters);
        $ldate = date('Y-m-d');

        $data = [];

        $data = \DB::table('promocion as p')
                        ->orderByRaw('RAND()')
                        ->join('linea as l', 'p.id_juego', '=', 'l.id_linea')
                        ->select("p.*", "l.id_linea")
                        ->where('p.estatus',1)
                        ->where('p.eliminado',0)
                        ->where('fecha_inicio','<=',$ldate)
                        ->where('fecha_fin','>=',$ldate);

        //-----> Aplicamos filtros

        if( isset( $parameters["linea"] ) && ! empty( $parameters["linea"] ) ){

        	$data = $data->where( "l.id_linea", "=", $parameters["linea"] );

        }

        if( isset( $parameters["id_linea"] ) && ! empty( $parameters["id_linea"] ) ){

            $data = $data->where( "l.id_linea", "=", $parameters["id_linea"] );

        }

        if( isset( $parameters["id_sucursal"] ) && ! empty( $parameters["id_sucursal"] ) ){

            $data = $data->select("p.*", "l.id_linea","ps.*")
                        ->join("promocion_sucursal as ps", "p.id_promocion", "=", "ps.id_promocion");
            $data = $data->where( "ps.id_sucursal", "=", $parameters["id_sucursal"] );

        } else {
            $data->where( "isParentShow", "=", 1);
        }



        $data = $data->groupBy('branch_group_id')
                        ->get();

        $getdata = [];
        foreach($data as $value){
            if($value->button_text == null || $value->is_active_btn==0 ){
                $value->is_active_btn = 0;
            }
            array_push($getdata,$value);
        }
//        ->tosql();
//        print_r($getdata);dd();

        return $data;

    }

    static function find($args = []){
        $get = \DB::table('promocion as p');
        $get = isset($args['slug']) ? $get->where('slug',$args['slug']) : $get;
        $get = $get->first();
        return $get;
    }

    static function find_valid_branch($id){
        $data = \DB::table('sucursal as s')
            ->select('s.nombre','s.slug','s.id_sucursal as id')
            ->join('promocion_sucursal as sp','sp.id_sucursal','=','s.id_sucursal')
            ->where('sp.id_promocion',$id)
            ->get();
        return $data;
    }

    static function get_dynamic($id){
        $data = \DB::table('pago_promocion as pp')->where('pp.id_promocion',$id)->get();
        return $data;
    }

}