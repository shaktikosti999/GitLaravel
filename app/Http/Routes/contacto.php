<?php
Route::get('/administrador/contacto.html','contactoController@index');
Route::get('/administrador/agregar/contacto.html','contactoController@create');
Route::get('/administrador/mostrar/contacto{id}.html','contactoController@show');
Route::post('/administrador/modificar/contacto{id}.html','contactoController@edit');
Route::patch('/administrador/modificar/contacto{id}.html','contactoController@update');
Route::put('/administrador/agregar/contacto.html','contactoController@store');
Route::delete('/administrador/eliminar/contacto{id}.html','contactoController@destroy');