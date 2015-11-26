<?php
//Registro
Route::get('catalogos', 'CatalogoServicioController@index');

// Home
Route::get('/', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);
Route::get('language', 'HomeController@language');


// Admin
Route::get('admin', [
	'uses' => 'AdminController@admin',
	'as' => 'admin',
	'middleware' => 'admin'
]);

Route::get('medias', [
	'uses' => 'AdminController@filemanager',
	'as' => 'medias',
	'middleware' => 'redac'
]);


// Blog
Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
Route::get('articles', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');


// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);


// User
Route::get('user/sort/{role}', 'UserController@indexSort');

Route::get('user/roles', 'UserController@getRoles');
Route::post('user/roles', 'UserController@postRoles');

Route::put('userseen/{user}', 'UserController@updateSeen');

Route::resource('user', 'UserController');

// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Adrian----------------------------------------------------------------------------

Route::get('/image', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);
Route::get('userservice/{id_usuario_op}',
    ['uses'=>'UsuarioServiciosController@getServiciosOperador','as'=>'userservice'
    ,'middleware' => 'notAuth']);


Route::post('servicios/servicioOprador', ['as' => 'upload-postServicioOperador', 'uses' =>'UsuarioServiciosController@postServicioOperadores']);
Route::get('/detalleServicios/{id_usuario_op}', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::get('/render/{id_partial}', ['as' => 'render', 'uses' => 'UsuarioServiciosController@RenderPartial']);
Route::get('/render/{id_partial}/{id_data}', ['as' => 'render', 'uses' => 'UsuarioServiciosController@RenderPartialWithData']);

Route::get('/editServicios/{id_usuario_op}', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::post('servicios/DetalleOperador', ['as' => 'upload-postDetalleOperador', 'uses' =>'UsuarioServiciosController@postDetalle']);
Route::get('/editServicios/{id_usuario_servicio}', ['as' => 'detailServicio', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::get('maps',function()
{
    
    return view('reusable.maps');
});

Route::post('maps',function()
{
    
    return Input::all();
});
Route::post('promocion', ['as' => 'postPromocion', 'uses' =>'UsuarioServiciosController@postPromocion']);
Route::post('itinerario', ['as' => 'postItinerario', 'uses' =>'UsuarioServiciosController@postItinerario']);
Route::post('evento', ['as' => 'postEvento', 'uses' =>'UsuarioServiciosController@postEvento']);
Route::post('itinerarioP', ['as' => 'postPuntoItinerario', 'uses' =>'UsuarioServiciosController@postPuntoItinerario']);


Route::get('promocion/{id_promocion}',
    ['uses'=>'UsuarioServiciosController@getPromociones','as'=>'getPromocion'
    ,'middleware' => 'notAuth']);

Route::get('itinerario/{id}',
    ['uses'=>'UsuarioServiciosController@getItinerarios','as'=>'getItinerarios'
    ,'middleware' => 'notAuth']);


Route::post('/delete/image/{id}', ['as' => 'delete-image', 'uses' =>'ImageController@postDeleteImage']);
Route::get('/getTipoDificultad', ['as' => 'tipoDificultad', 'uses' => 'UsuarioServiciosController@getTipoDificultad']);
Route::get('/getlistaItinerarios/{id}', ['as' => 'itinerariosList', 'uses' => 'UsuarioServiciosController@getListaItinerarios']);
Route::get('/getlistaServiciosComplete/{id_usuario_servicio}', ['as' => 'completeServices', 'uses' => 'UsuarioServiciosController@getAllServicios']);


// Event::listen('illuminate.query', function($query)
 //{
  //var_dump($query);
 //});
// ////////////////////////


//servicios

Route::get('servicios', 'ServicioController@index');

Route::post('servicios/tipoOperador', ['as' => 'upload-postTipoOperador', 'uses' =>'ServicioController@postTipoOperadores']);
Route::post('servicios/operador', ['as' => 'upload-postoperador', 'uses' =>'ServicioController@postOperadores']);
Route::get('servicios/operadorServicios', 'ServicioController@step3');
Route::get('servicios/operador/{tipoOperador}', 'ServicioController@step2');

Route::get('servicios/serviciooperador/{id}/{id_catalogo}', ['as' => 'details.show', 'uses' => 'ServicioController@step4'] );
Route::post('servicios/serviciosoperador', ['as' => 'upload-postusuarioservicios', 'uses' =>'ServicioController@postUsuarioServicios']);
Route::post('servicios/serviciosoperadormini', ['as' => 'upload-postusuarioserviciosmini', 'uses' =>'ServicioController@postUsuarioServiciosMini']);
