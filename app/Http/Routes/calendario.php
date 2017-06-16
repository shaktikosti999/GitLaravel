<?php
Route::get('/administrador/calendario.html','calendarioController@index');
Route::get('/administrador/agregar/calendario.html','calendarioController@create');
Route::get('/administrador/mostrar/calendario{id}.html','calendarioController@show');
Route::post('/administrador/modificar/calendario{id}.html','calendarioController@edit');
Route::patch('/administrador/modificar/calendario{id}.html','calendarioController@update');
Route::put('/administrador/agregar/calendario.html','calendarioController@store');
Route::delete('/administrador/eliminar/calendario{id}.html','calendarioController@destroy');