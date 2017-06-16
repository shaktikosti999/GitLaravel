<?php
Route::get('/administrador/torneo.html','torneoController@index');
Route::get('/administrador/agregar/torneo.html','torneoController@create');
Route::get('/administrador/mostrar/torneo{id}.html','torneoController@show');
Route::post('/administrador/modificar/torneo{id}.html','torneoController@edit');
Route::patch('/administrador/modificar/torneo{id}.html','torneoController@update');
Route::put('/administrador/agregar/torneo.html','torneoController@store');
Route::delete('/administrador/eliminar/torneo{id}.html','torneoController@destroy');