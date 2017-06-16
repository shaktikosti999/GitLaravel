<?php 
Route::get('/administrador/pagina_de_contenido.html','paginaController@index');
Route::get('/administrador/agregar/pagina_de_contenido.html','paginaController@create');
Route::put('/administrador/agregar/pagina_de_contenido.html','paginaController@store');
Route::post('/administrador/modificar/pagina_de_contenido{id}.html','paginaController@edit');
Route::patch('/administrador/modificar/pagina_de_contenido{id}.html','paginaController@update');
Route::get('/administrador/mostrar/pagina_de_contenido{id}.html','paginaController@show');