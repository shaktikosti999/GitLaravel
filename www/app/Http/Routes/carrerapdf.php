<?php
Route::get('/administrador/pdfcarrera.html','carrerapdfController@index');
Route::get('/administrador/agregar/pdfcarrera.html','carrerapdfController@create');
Route::get('/administrador/mostrar/pdfcarrera{id}.html','carrerapdfController@show');
Route::post('/administrador/modificar/pdfcarrera{id}.html','carrerapdfController@edit');
Route::patch('/administrador/modificar/pdfcarrera{id}.html','carrerapdfController@update');
Route::put('/administrador/agregar/pdfcarrera.html','carrerapdfController@store');
Route::delete('/administrador/eliminar/pdfcarrera{id}.html','carrerapdfController@destroy');