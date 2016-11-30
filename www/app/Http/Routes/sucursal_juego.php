<?php
Route::post('/administrador/juego.html','sucursalController@games');
Route::patch('/administrador/juego.html','sucursalController@infogames');
Route::patch('/administrador/agregar/juego.html','sucursalController@gamesStore');
Route::patch('/administrador/modificar/juego.html','sucursalController@gamesUpdate');
Route::delete('/administrador/juego.html','sucursalController@gameDelete');