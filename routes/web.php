<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::middleware(['auth','user'])->prefix('user')->namespace('User')->group(function () {
	Route::get('/mesas', 'MesasController@index');  				//Listado	
	Route::get('/mesas/{id}','MesasController@movimientos');				//Mostrar Contenido de una Mesa
	Route::get('/mesas/{id}/products/agregar','MesasController@agregarproducto');				//Agregar Articulo a la Mesa
	Route::post('/mesas/{id}/products/agregar','MesasController@store'); //Agregar Item a la mesa
	Route::get('/products/agregar','MesasController@agregarproducto');				//Agregar Articulo a la Mesa
	Route::delete('/mesas/{id}/products/eliminiar','MesasController@destroy'); //Quitar Item de la mesa
	Route::get('/products/search','SearchController@show'); //Buscar un producto
	Route::get('/mesas/{id}/cerrar','MesasController@cerrarmesa');	//Form Cerrar mesa
	Route::post('/mesas/{id}/cerrar', 'MesasController@cerrar');	//Cerrar Mesa
});

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products', 'ProductController@index');  				//Listado
	Route::get('/products/create', 'ProductController@create'); 		//Creación
	Route::post('/products', 'ProductController@store'); 				//Registro en la BD
	Route::get('/products/{id}/edit', 'ProductController@edit'); 		//formulario para edicion
	Route::post('/products/{id}/edit', 'ProductController@update');	//Confirmación de la edi
	Route::delete('/products/{id}', 'ProductController@destroy'); 	//formulario para eliminación
	//Route::post('/products/{id}/delete', 'ProductController@destroy');//Confirmación de la eli

	// CRud     de Productos
	//Rooms
	Route::get('/rooms', 'RoomController@index');  				//Listado
	Route::get('/rooms/create', 'RoomController@create'); 		//Creación
	Route::post('/rooms', 'RoomController@store'); 				//Registro en la BD
	Route::get('/rooms/{id}/edit', 'RoomController@edit'); 		//formulario para edicion
	Route::post('/rooms/{id}/edit', 'RoomController@update');	//Confirmación de la edi
	Route::delete('/rooms/{id}', 'RoomController@destroy'); 	//formulario para eliminación

	//Gestion de imagenes
	Route::get('/products/{id}/images', 'ImageController@index');  				//Listado
	Route::post('/products/{id}/images', 'ImageController@store'); 				//Registro en la BD
	Route::delete('/products/{id}/images', 'ImageController@destroy'); 	//formulario para eliminación
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');  				//Destacar

	//Categorias
	Route::get('/categories', 'CategoryController@index');  				//Listado
	Route::get('/categories/create', 'CategoryController@create'); 			//Creación
	Route::post('/categories', 'CategoryController@store'); 				//Registro en la BD
	Route::get('/categories/{id}/edit', 'CategoryController@edit'); 		//formulario para edicion
	Route::post('/categories/{id}/edit', 'CategoryController@update');		//Confirmación de la edi
	Route::delete('/categories/{id}', 'CategoryController@destroy'); 		//formulario para eliminación
	Route::get('/categories/{id}/images', 'CategoryController@editimage'); 	//Ver IMG
	Route::post('/categories/{id}/images', 'CategoryController@storeimage');//Registro en la BD

});


//Procuts


