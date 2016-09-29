<?php
Route::get('/administrador/newsletter.html','newsletterController@index');
Route::get('/administrador/agregar/newsletter.html','newsletterController@create');
Route::get('/administrador/mostrar/newsletter{id}.html','newsletterController@show');
Route::post('/administrador/modificar/newsletter{id}.html','newsletterController@edit');
Route::patch('/administrador/modificar/newsletter{id}.html','newsletterController@update');
Route::put('/administrador/agregar/newsletter.html','newsletterController@store');
Route::delete('/administrador/eliminar/newsletter{id}.html','newsletterController@destroy');