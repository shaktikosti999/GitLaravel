<?php
Route::get('/administrador/sucursal.html','sucursalController@index');
Route::get('/administrador/agregar/sucursal.html','sucursalController@create');
Route::get('/administrador/mostrar/sucursal{id}.html','sucursalController@show');
Route::post('/administrador/modificar/sucursal{id}.html','sucursalController@edit');
Route::patch('/administrador/modificar/sucursal{id}.html','sucursalController@update');
Route::put('/administrador/agregar/sucursal.html','sucursalController@store');
Route::delete('/administrador/eliminar/sucursal{id}.html','sucursalController@destroy');

// -----> Galerías
Route::post('/administrador/sucursal.html','sucursalController@getGallery');
Route::patch('/administrador/agregar/sucursal.html','sucursalController@saveGallery');