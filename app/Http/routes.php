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
Route::get('/prueba_ws','soapController@index');
Route::get('/server.md5','soapController@serv');
include_once('Routes/auth.php');
Route::group(['middleware' => 'auth'], function () {
	Route::delete('/administrador/eliminar/categoria.html','categoriaController@destroy');

	Route::get('/',function(){return view('layout.admin');});
	Route::get('/administrador', function () {return view('layout.admin');});
	Route::patch('/administrador/listar/{modulo}.html','generalController@listar')->where(['modulo'=>'[a-zA-Z]+[a-zA-Z_]*']);

	Route::put('/administrador/newsletter/newmail.html','newsletterController@create');
	Route::put('/administrador/contacto/newmail.html','contactoController@create');

	// Asignar Dinámica a promoción y sucursal
	include_once('Routes/dinamica.php');

	Route::patch('/administrador/slider/calendario.html','calendarioController@storeSlider');
	Route::post('/administrador/slider/calendario.html','calendarioController@getSlider');

	//Pagado y Acumulado por pagar
	Route::patch('/administrador/agregar/pago.html','sucursalController@add_pay');
	Route::post('/administrador/ver/pago.html','sucursalController@get_pay');
	Route::delete('/administrador/borrar/pago.html','sucursalController@destroy_pay');

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
		include_once('Routes/carrerapdf.php');
		include_once('Routes/torneo.php');
        include_once('Routes/eventos.php');
		include_once('Routes/slider.php');
		include_once('Routes/promocion.php');
		include_once('Routes/textfooter.php');
		include_once('Routes/pagina_contenido.php');
		include_once('Routes/calendario.php');
		include_once('Routes/error.php');
		include_once('Routes/configuracion.php');

	});
});

//-----> Homepage
Route::get('/','front\indexController@index');

//-----> Promociones
// Route::get('/promociones', function(){
	// return view('front.promociones.promotions');
// });
Route::get('/promociones/calendario/{slug}','front\promocionesController@show');
Route::get('/promociones/{sucursal?}','front\promocionesController@index');
Route::get('/promociones/detalle/{slug}','front\promocionesController@details');

//-----> Lineas
Route::get('/lineas-de-juego/maquinas-de-juego/{sucursal?}','front\lineasController@maquinas');
Route::get('/lineas-de-juego/mesas-de-juego/{sucursal?}','front\lineasController@mesas');
Route::get('/lineas-de-juego/apuesta-de-carreras/{sucursal?}','front\lineasController@carreras');
Route::get('/lineas-de-juego/apuesta-deportiva/{sucursal?}','front\lineasController@deportivas');
Route::get('/{slug_maquina}/detalle/{slug}','front\lineasController@detalle_juego');
Route::patch('/filtro-maquinas','front\api\filtroController@filtro_maquinas');
Route::patch('/get-mesa-juego','front\api\filtroController@get_mesa');
Route::patch('/ver-lineas','front\api\filtroController@get_lineas');

Route::get('/getAllDataAcumulados/{sucursal?}/{limit}','front\lineasController@getAllDataDetailAcumulados');
Route::get('/getAllDataPagados/{sucursal?}/{limit}','front\lineasController@getAllDataDetailPagados');



Route::post('/contacto/newsletter','front\contactoController@newsletter');

//-----> Alimentos y bebidas
Route::get('/alimentos-y-bebidas/{sucursal?}','front\alimentosController@index');

// -----> Ubicaciones
//Route::get('/ubicaciones','front\ubicacionesController@index');
// -----> Juegos
Route::get('/aprende_a_jugar/{slug?}','front\lineasController@learn_to_play');
Route::get('/reglas/{slug?}','front\lineasController@rules_for_game');
// -----> Sucursales
Route::get('/sucursal','front\sucursalesController@general');
Route::get('/sucursal/{slug}','front\sucursalesController@index');
// ajax para modales
Route::patch('/sucursales','front\api\indexModalsController@sucursales');
Route::patch('/ciudades_sucursal','front\api\indexModalsController@ciudades');
Route::patch('/lineas_ciudades','front\api\indexModalsController@lineas');

// ----->Calendario
Route::get('calendario','front\calendarioController@show');

// -----> Contacto
Route::get('/contacto','front\contactoController@contacto');
Route::put('/contacto/guardar', 'contactoController@store');

// -----> Torneos
Route::get('/torneos/{slug?}','front\torneosController@index');

// -----> Búsqueda
Route::get('/resultados','front\indexController@search');


Route::group(['prefix' => 'api'], function(){
	Route::group(['prefix' => 'get'], function(){
		Route::get('test',function(){
			return "test";
		});
		Route::get('Ubicaciones','front\apiController@Ubicaciones');

		Route::get('Promociones/{id_sucursal}','front\apiController@Promociones');

		Route::get('CalienteClub','front\apiController@CalienteClub');

		Route::get('JuegoResponsable','front\apiController@JuegoResponsable');

		Route::get('AvisoPrivacidad','front\apiController@AvisoPrivacidad');
		
		Route::get('QuienesSomos','front\apiController@QuienesSomos');
	});
});



Route::get('{pagina}','front\paginaController@index')->where('pagina','.+');
