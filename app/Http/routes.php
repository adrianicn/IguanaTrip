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
Route::get('userservice',
    ['uses'=>'UsuarioServiciosController@getServiciosOperador','as'=>'userservice'
    ,'middleware' => 'notAuth']);


Route::post('servicioOperador', ['as' => 'upload-postServicioOperador', 'uses' =>'UsuarioServiciosController@postServicioOperadores','middleware' => 'notAuth']);
Route::post('estadoItinerario/{id}', ['as' => 'postEstadoItinerario', 'uses' =>'UsuarioServiciosController@postEstadoDetalleItinerario','middleware' => 'notAuth']);
Route::post('deleteItinerario/{id}', ['as' => 'postEstadoItinerario', 'uses' =>'UsuarioServiciosController@postDeleteItinerario','middleware' => 'notAuth']);
Route::post('estadoItinerarioPrincipal/{id}', ['as' => 'postEstadoItinerarioPrincipal', 'uses' =>'UsuarioServiciosController@postEstadoItinerario','middleware' => 'notAuth']);
Route::post('estadoPromocion/{id}', ['as' => 'postEstadoPromocion', 'uses' =>'UsuarioServiciosController@postEstadoPromocion','middleware' => 'notAuth']);
Route::post('estadoEvento/{id}', ['as' => 'postEstadoEvento', 'uses' =>'UsuarioServiciosController@postEstadoEvento','middleware' => 'notAuth']);

Route::post('invitacion', ['as' => 'postinvitaamigo', 'uses' =>'UsuarioServiciosController@postInvitarAmigo','middleware' => 'notAuth']);

Route::get('/detalleServicios', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios','middleware' => 'notAuth']);
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
Route::post('promocion', ['as' => 'postPromocion', 'uses' =>'UsuarioServiciosController@postPromocion','middleware' => 'notAuth']);
Route::post('itinerario', ['as' => 'postItinerario', 'uses' =>'UsuarioServiciosController@postItinerario','middleware' => 'notAuth']);
Route::post('evento', ['as' => 'postEvento', 'uses' =>'UsuarioServiciosController@postEvento','middleware' => 'notAuth']);
Route::post('itinerarioP', ['as' => 'postPuntoItinerario', 'uses' =>'UsuarioServiciosController@postPuntoItinerario','middleware' => 'notAuth']);


Route::get('promocion/{id_promocion}',
    ['uses'=>'UsuarioServiciosController@getPromociones','as'=>'getPromocion'
    ,'middleware' => 'notAuth']);
Route::get('eventos/{id}',
    ['uses'=>'UsuarioServiciosController@getEventos','as'=>'getEventos'
    ,'middleware' => 'notAuth']);


Route::get('itinerario/{id}',
    ['uses'=>'UsuarioServiciosController@getItinerarios','as'=>'getItinerarios'
    ,'middleware' => 'notAuth']);


Route::post('/delete/image/{id}', ['as' => 'delete-image', 'uses' =>'ImageController@postDeleteImage']);
Route::get('/getTipoDificultad', ['as' => 'tipoDificultad', 'uses' => 'UsuarioServiciosController@getTipoDificultad','middleware' => 'notAuth']);

Route::get('thankyou',function()
{
    
    return view('Registro.endRegister');
});

Route::get('terminos',function()
{
    
    return view('RegistroOperadores.registroTerminos');
});

Route::get('acerca',function()
{
    
    return view('RegistroOperadores.registroAcercaDe');
});



Route::get('/getlistaItinerarios/{id}', ['as' => 'itinerariosList', 'uses' => 'UsuarioServiciosController@getListaItinerarios','middleware' => 'notAuth']);
Route::get('/getProvincias/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getProvincias']);
Route::get('/getCantones/{id}/{id_canton}/{id_parroquia}', ['as' => 'cantones', 'uses' => 'UsuarioServiciosController@getCantones']);
Route::get('/getParroquias/{id}/{id_parroquia}', ['as' => 'parroquias', 'uses' => 'UsuarioServiciosController@getParroquias']);

Route::get('/getOnlyProvincias', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getOnlyProvincias']);
Route::get('/getOnlyCanton/{id}', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getOnlyCanton']);
Route::get('/getProvinciasCanton', ['as' => 'provincia', 'uses' => 'UsuarioServiciosController@getProvinciaCanton']);
Route::get('/getDescripcionGeografica/{id}/{id_catalogo}', ['as' => 'cantones', 'uses' => 'UsuarioServiciosController@getDescripcionGeografica']);



Route::get('/getlistaServiciosComplete/{id_usuario_servicio}', ['as' => 'completeServices', 'uses' => 'UsuarioServiciosController@getAllServicios','middleware' => 'notAuth']);


Route::get('/getProvinciasDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getProvinciasDescipcion','middleware' => 'notAuth']);
Route::get('/getCantonesDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getCantonesDescipcion','middleware' => 'notAuth']);
Route::get('/getParroquiaDescipcion', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getparroquiaDescipcion','middleware' => 'notAuth']);


Route::get('/getProvinciasDescipciones/{id}', ['as' => 'provincias', 'uses' => 'UsuarioServiciosController@getProvinciasDescipciones','middleware' => 'notAuth']);

Route::post('postGeoLoc', ['as' => 'postGeoLoc', 'uses' =>'UsuarioServiciosController@postGeoLoc','middleware' => 'notAuth']);

// Event::listen('illuminate.query', function($query)
 //{
  //var_dump($query);
 //});
// ////////////////////////


//servicios

Route::get('servicios', 'ServicioController@index');

Route::post('servicios/tipoOperador', ['as' => 'upload-postTipoOperador', 'uses' =>'ServicioController@postTipoOperadores','middleware' => 'notAuth']);
Route::post('servicios/operadores', ['as' => 'upload-postoperador', 'uses' =>'ServicioController@postOperadores','middleware' => 'notAuth']);

Route::get('servicios/operadorServicios', ['as' => 'operadorServicios', 'uses' => 'ServicioController@step3','middleware' => 'notAuth']);
Route::get('operador', ['as' => 'operador', 'uses' => 'ServicioController@step2','middleware' => 'notAuth']);




Route::get('servicios/serviciooperador/{id}/{id_catalogo}', ['as' => 'details.show', 'uses' => 'ServicioController@step4','middleware' => 'notAuth'] );
Route::post('servicios/serviciosoperador', ['as' => 'upload-postusuarioservicios', 'uses' =>'ServicioController@postUsuarioServicios','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini', ['as' => 'upload-postusuarioserviciosmini', 'uses' =>'ServicioController@postUsuarioServiciosMini','middleware' => 'notAuth']);



/*Rutas dispositivo mobil*/


Route::get('loginmobile',function()
{
    
    return view('mobile.logInMobile.LogInMobile');
});

Route::get('registerMobile',function()
{
    
    return view('mobile.logInMobile.registerMobile');
});

/**End rutas dispositivo mobil************************************************/