<?php
Route::get('/administrador/eventos.html','eventosController@index');
Route::get('/administrador/agregar/eventos.html','eventosController@create');
Route::get('/administrador/mostrar/eventos{id}.html','eventosController@show');
Route::post('/administrador/modificar/eventos{id}.html','eventosController@edit');
Route::patch('/administrador/modificar/eventos{id}.html','eventosController@update');
Route::put('/administrador/agregar/eventos.html','eventosController@store');
Route::delete('/administrador/eliminar/eventos{id}.html','eventosController@destroy');