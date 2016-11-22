<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Breadcrumbs
        $url = \Request::url();
        $url = explode(url('/').'/', $url);
        $breadcrumbs = [];
        $breadcrumbs[] = (object)[
            'url' => url('/'),
            'text' => 'Inicio'
        ];
        if( isset($url[1]) )
            $url = explode('/',$url[1]);
        if( count($url) )
            foreach($url as $item){
                $routeExists = \Route::getRoutes()->hasNamedRoute(end($breadcrumbs)->url . '/' . $item);
                $breadcrumbs[] = (object)[
                    'url' => end($breadcrumbs)->url . '/' . $item,
                    'text' => ucwords(str_replace("-", " ", $item))
                ];
            }
        // array_pop($breadcrumbs);

        //Redes Sociales

        $rs = \DB::table('red_social as rs')
            ->select('rs.link','rs.tipo','s.nombre')
            ->join('sucursal as s','s.id_sucursal','=','rs.id_sucursal')
            ->get();

        $sn = array();
        foreach($rs as $val)
            $sn[$val->tipo][] = (object)['link'=>$val->link,'nombre'=>$val->nombre];

        view()->share('breadcrumbs',$breadcrumbs);
        if( count($sn) )
            view()->share('sn',$sn);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
