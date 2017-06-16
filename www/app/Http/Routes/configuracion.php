<?php
Route::get('/administrador/configuracion.html','configuracionController@index');
Route::get('/administrador/agregar/configuracion.html',function () {return view('back.configuracion.create');});
//Route::get('/administrador/mostrar/slider{id}.html','sliderController@show');
Route::post('/administrador/modificar/configuracion{id}.html','configuracionController@edit');
Route::patch('/administrador/modificar/configuracion{id}.html','configuracionController@update');
Route::put('/administrador/agregar/configuracion.html','configuracionController@store');
Route::post('/administrador/eliminar/configuracion{id}.html','configuracionController@destroy');
