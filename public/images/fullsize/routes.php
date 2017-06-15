<?php
//Registro
Route::get('catalogos', 'CatalogoServicioController@index');

// Home
Route::get('/login', [
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
Route::post('/uploadImage/{id}', ['as' => 'uploadDesc-image', 'uses' =>'ImageController@postDescrImage']);
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

Route::get('contactAdmin',function()
{
    
    return view('Welcome.contact');
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

Route::get('/imagenesAjax/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImages','middleware' => 'notAuth']);

Route::get('/imagenesAjaxDescription/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImagesDescription','middleware' => 'notAuth']);



Route::get('/servicios', ['as' => 'servicios', 'uses' => 'ServicioController@index','middleware' => 'notAuth']);

Route::get('/myProfileOp', ['as' => 'profileOp', 'uses' => 'ServicioController@getMyProfileOp']);



Route::post('servicios/tipoOperador', ['as' => 'upload-postTipoOperador', 'uses' =>'ServicioController@postTipoOperadores','middleware' => 'notAuth']);
Route::post('tipoOperadorProfile', ['as' => 'postTipoOperadorProfile', 'uses' =>'ServicioController@postTipoOperadoresProfile','middleware' => 'notAuth']);
Route::post('servicios/operadores', ['as' => 'upload-postoperador', 'uses' =>'ServicioController@postOperadores','middleware' => 'notAuth']);

Route::get('servicios/operadorServicios', ['as' => 'operadorServicios', 'uses' => 'ServicioController@step3','middleware' => 'notAuth']);
Route::get('operador', ['as' => 'operador', 'uses' => 'ServicioController@step2','middleware' => 'notAuth']);




Route::get('servicios/serviciooperador/{id}/{id_catalogo}', ['as' => 'details.show', 'uses' => 'ServicioController@step4','middleware' => 'notAuth'] );
Route::post('servicios/serviciosoperador', ['as' => 'upload-postusuarioservicios', 'uses' =>'ServicioController@postUsuarioServicios','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadormini', ['as' => 'upload-postusuarioserviciosmini', 'uses' =>'ServicioController@postUsuarioServiciosMini','middleware' => 'notAuth']);
Route::post('servicios/serviciosoperadorminiPadre', ['as' => 'upload-postusuarioserviciosminiPadre', 'uses' =>'ServicioController@postUsuarioServiciosMiniPadre','middleware' => 'notAuth']);



/*Rutas dispositivo mobil*/


Route::get('loginmobile',function()
{
    
    return view('mobile.logInMobile.LogInMobile');
});


Route::get('steps',function()
{
    
    return view('public_page.general.steps');
});

Route::get('ServiciosOperadores',function()
{
    
    return view('public_page.general.servicios_op');
});


Route::get('contactos',function()
{
    
    return view('public_page.general.contacts');
});


Route::get('InvitacionOperadores',function()
{
    
    return view('public_page.general.servicios_inv');
});


Route::get('registerMobile', ['as' => 'registerMobile', 'uses' => 'ServicioController@registerMobile'] );


/**End rutas dispositivo mobil************************************************/




/*Rutas para la parte publica del sistema*/
Route::post('likesSat/{id_atraccion}', ['as' => 'likesS', 'uses' =>'HomePublicController@postLikesS']);
Route::post('filterParameters', ['as' => 'filtersCategoria', 'uses' =>'HomePublicController@postFiltersCategoria']);
Route::post('postReviews', ['as' => 'postReviews', 'uses' =>'HomePublicController@postReviews']);

Route::get('/', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);
Route::get('/tokenDc', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);



Route::get('/getRegiones', ['as' => 'regiones', 'uses' => 'HomePublicController@getRegiones']);
Route::get('/getProvinciaDescipcion/{id_provincia}/{id_image}', ['as' => 'provinciasdescr', 'uses' => 'HomePublicController@getProvinciaDescripcion']);
Route::get('/getRegionDescipcion/{id_region}', ['as' => 'regiondescr', 'uses' => 'HomePublicController@getRegionsId']);

Route::get('/getTopPlaces', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getTopPlaces']);
Route::get('/getEventscloseToMe/{city}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getcloseToMe']);
Route::get('/getEventscity/{city}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getbyCity']);


//ruta para el detalle de la atraccion
Route::get('/detalle/{nombre_atraccion}/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getAtraccionDescripcion']);

//busqueda desde el home para los catalogos
Route::get('/tokenDz$rip/{id_catalogo}', ['as' => 'searchCat', 'uses' => 'HomePublicController@getSearchHomeCatalogo']);


Route::get('/getConfirmReview/{codigo}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getConfirmReview']);


Route::get('/tokenDc$ripT/{id_atraccion}/{id_catalogo}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getCatalogoDescripcion']);
Route::get('/getCatalogosServicios/{id_atraccion}/{id_catalogo}', ['as' => 'catalogoServicios', 'uses' => 'HomePublicController@getCatalosoServicios']);
Route::get('/getSearchCatalogosServicios/{id_catalogo}/{ciudad}', ['as' => 'SearchcatalogoServicios', 'uses' => 'HomePublicController@getCatalosoServiciosSearch']);




Route::get('/tokenDc$ripPromo/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getPromocionesAtraccion']);
Route::get('/tokenDc$ripEvent/{id_atraccion}', ['as' => 'atracciondescr', 'uses' => 'HomePublicController@getEventosAtraccion']);


Route::get('/getCercanosIntern/{id_atraccion}/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'topPlaces', 'uses' => 'HomePublicController@getCercanosIntern']);
Route::get('/getLikesA/{id_atraccion}', ['as' => 'getLikes', 'uses' => 'HomePublicController@getLikesSatisf']);
Route::get('/getReviews/{id_atraccion}', ['as' => 'getReviews', 'uses' => 'HomePublicController@getReviews']);

Route::get('/getSearchTotal/{term}', ['as' => 'SearchTotal', 'uses' => 'SearchController@getSearchTotal']);
Route::get('/getSearchTotalPartial/{term}', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getTotalSearchInside']);

Route::get('/TermsConditions', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getTermsConditions']);
Route::get('/AboutUs', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getAboutUs']);
Route::get('/Mision', ['as' => 'SearchTotalPartial', 'uses' => 'SearchController@getMision']);
        
Route::get('Search', ['as' => 'min-search', 'uses' =>'SearchController@getSearchTotal']);

 /*  Fin de las rutas del sistema publico*/