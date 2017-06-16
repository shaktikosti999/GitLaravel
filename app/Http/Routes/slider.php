<?php
Route::get('/administrador/slider.html','sliderController@index');
Route::get('/administrador/agregar/slider.html','sliderController@create');
Route::get('/administrador/mostrar/slider{id}.html','sliderController@show');
Route::post('/administrador/modificar/slider{id}.html','sliderController@edit');
Route::patch('/administrador/modificar/slider{id}.html','sliderController@update');
Route::put('/administrador/agregar/slider.html','sliderController@store');
Route::delete('/administrador/eliminar/slider{id}.html','sliderController@destroy');