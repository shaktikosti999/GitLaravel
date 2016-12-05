<?php
Route::get('/administrador/linea.html','lineaController@index');
Route::get('/administrador/agregar/linea.html','lineaController@create');
Route::get('/administrador/mostrar/linea{id}.html','lineaController@show');
Route::post('/administrador/modificar/linea{id}.html','lineaController@edit');
Route::patch('/administrador/modificar/linea{id}.html','lineaController@update');
Route::put('/administrador/agregar/linea.html','lineaController@store');
Route::delete('/administrador/eliminar/linea{id}.html','lineaController@destroy');

// -----> Galerías
Route::post('/administrador/linea.html','lineaController@getGallery');
Route::patch('/administrador/agregar/linea.html','lineaController@saveGallery');