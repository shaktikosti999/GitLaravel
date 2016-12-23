<?php
Route::patch('/promociones/branches','promocionController@get_branches');
Route::put('administrador/agregar/pago_promocion.html','promocionController@store_dinamica');