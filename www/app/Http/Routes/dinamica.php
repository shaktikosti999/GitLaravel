<?php
Route::patch('/promociones/branches','promocionController@get_branches');
Route::patch('administrador/obtener/pago_promocion.html','promocionController@get_dinamica');
Route::put('administrador/agregar/pago_promocion.html','promocionController@store_dinamica');
Route::put('administrador/modificar/pago_promocion.html','promocionController@update_dinamica');