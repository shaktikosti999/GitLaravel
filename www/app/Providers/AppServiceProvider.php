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
        //
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
        view()->share('breadcrumbs',$breadcrumbs);
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
