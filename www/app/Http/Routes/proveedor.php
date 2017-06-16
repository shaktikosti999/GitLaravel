<?php
Route::get('/administrador/proveedor.html','proveedorController@index');
Route::get('/administrador/agregar/proveedor.html','proveedorController@create');
Route::get('/administrador/mostrar/proveedor{id}.html','proveedorController@show');
Route::post('/administrador/modificar/proveedor{id}.html','proveedorController@edit');
Route::patch('/administrador/modificar/proveedor{id}.html','proveedorController@update');
Route::put('/administrador/agregar/proveedor.html','proveedorController@store');
Route::delete('/administrador/eliminar/proveedor{id}.html','proveedorController@destroy');