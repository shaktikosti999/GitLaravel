<?php
Route::get('/administrador/alimento.html','alimentoController@index');
Route::get('/administrador/agregar/alimento.html','alimentoController@create');
Route::get('/administrador/mostrar/alimento{id}.html','alimentoController@show');
Route::post('/administrador/modificar/alimento{id}.html','alimentoController@edit');
Route::patch('/administrador/modificar/alimento{id}.html','alimentoController@update');
Route::put('/administrador/agregar/alimento.html','alimentoController@store');
Route::delete('/administrador/eliminar/alimento{id}.html','alimentoController@destroy');