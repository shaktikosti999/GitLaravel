<?php
Route::get('/administrador/red.html','redController@index');
Route::get('/administrador/agregar/red.html','redController@create');
Route::get('/administrador/mostrar/red{id}.html','redController@show');
Route::post('/administrador/modificar/red{id}.html','redController@edit');
Route::patch('/administrador/modificar/red{id}.html','redController@update');
Route::put('/administrador/agregar/red.html','redController@store');
Route::delete('/administrador/eliminar/red{id}.html','redController@destroy');