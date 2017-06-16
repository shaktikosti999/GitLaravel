<?php
Route::get('/administrador/juego.html','juegoController@index');
Route::get('/administrador/agregar/juego.html','juegoController@create');
Route::get('/administrador/mostrar/juego{id}.html','juegoController@show');
Route::post('/administrador/modificar/juego{id}.html','juegoController@edit');
Route::patch('/administrador/modificar/juego{id}.html','juegoController@update');
Route::put('/administrador/agregar/juego.html','juegoController@store');
Route::delete('/administrador/eliminar/juego{id}.html','juegoController@destroy');