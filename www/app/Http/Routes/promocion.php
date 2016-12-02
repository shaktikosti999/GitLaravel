<?php
Route::get('/administrador/promocion.html','promocionController@index');
Route::get('/administrador/agregar/promocion.html','promocionController@create');
Route::get('/administrador/mostrar/promocion{id}.html','promocionController@show');
Route::post('/administrador/modificar/promocion{id}.html','promocionController@edit');
Route::patch('/administrador/modificar/promocion{id}.html','promocionController@update');
Route::put('/administrador/agregar/promocion.html','promocionController@store');
Route::delete('/administrador/eliminar/promocion{id}.html','promocionController@destroy');