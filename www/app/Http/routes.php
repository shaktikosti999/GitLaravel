<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
include_once('Routes/auth.php');
Route::group(['middleware' => 'auth'], function () {

	Route::get('/',function(){return view('layout.admin');});
	Route::get('/administrador', function () {return view('layout.admin');});
	Route::patch('/administrador/listar/{modulo}.html','generalController@listar')->where(['modulo'=>'[a-zA-Z]+[a-zA-Z_]*']);

	Route::group(['middleware' => 'permisos'], function() {
		Route::post('/administrador/estatus/{modulo}.html','generalController@estatus');
		Route::delete('/administrador/eliminar/{modulo}{id}.html','generalController@destroy')->where(['modulo'=>'[a-zA-Z]+[a-zA-Z_]*','id'=>'[1-9]+[0-9]*']);
		Route::post('/administrador/restaurar/{modulo}{id}.html','generalController@restore')->where(['modulo'=>'[a-zA-Z]+[a-zA-Z_]*','id'=>'[1-9]+[0-9]*']);
		// Route::get('/administrador/mostrar/{modulo}{id}.html','generalController@show')->where(['modulo'=>'[a-zA-Z]+[a-zA-Z_]*','id'=>'[1-9]+[0-9]*']);
		
		include_once('Routes/dash.php');
		include_once('Routes/idiomas.php');
		include_once('Routes/modulo.php');
		include_once('Routes/papelera.php');
		include_once('Routes/permiso.php');
		include_once('Routes/privilegio.php');
		include_once('Routes/rol.php');
		include_once('Routes/seccion.php');
		include_once('Routes/usuario.php');

		include_once('Routes/alimento.php');
		include_once('Routes/contacto.php');
		include_once('Routes/juego.php');
		include_once('Routes/linea.php');
		include_once('Routes/newsletter.php');
		include_once('Routes/proveedor.php');
		include_once('Routes/sucursal.php');
		include_once('Routes/sucursal_juego.php');
		include_once('Routes/red.php');

	});
});

//-----> Homepage
Route::get('/','front\indexController@index');

//-----> Lineas
Route::get('/lineas-de-juego/maquinas-de-juego/{sucursal?}','front\lineasController@maquinas');
Route::get('/lineas-de-juego/mesas-de-juego/{sucursal?}','front\lineasController@mesas');

//-----> Promociones
Route::get('/promociones/{sucursal?}','front\promocionesController@index');
Route::get('/promociones/detalle/{slug}','front\promocionesController@show');

Route::post('/contacto/newsletter','front\contactoController@newsletter');

//-----> Alimentos y bebidas
Route::get('/alimentos-y-bebidas/{sucursal?}','front\alimentosController@index');

// -----> Ubicaciones
//Route::get('/ubicaciones','front\ubicacionesController@index');

// -----> Sucursales
Route::get('/sucursal/{slug?}','front\sucursalesController@index');
// ajax para modales
Route::patch('/sucursales','front\api\indexModalsController@sucursales');
Route::patch('/ciudades_sucursal','front\api\indexModalsController@ciudades');

// ----->Calendario
Route::get('calendario','front\calendarioController@show');

// -----> Contacto
Route::get('/contacto','front\contactoController@contacto');
Route::put('/contacto/guardar', 'contactoController@store');

Route::get('{pagina}','front\paginaController@index')->where('pagina','.+');