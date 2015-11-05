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




//servicios
Route::get('servicios', 'ServicioController@index');
<<<<<<< HEAD
=======

Route::get('userservice', 'HomeController@index1');

//Route::get('servicios/tipoOperador', 'ServicioController@step2');
>>>>>>> 2b2485fd2e840ba6cc54134b4a06e834f9d53884


Route::post('servicios/tipoOperador', ['as' => 'upload-postTipoOperador', 'uses' =>'ServicioController@postTipoOperadores']);
<<<<<<< HEAD
Route::get('servicios/operador/{tipoOperador}', 'ServicioController@step2');
Route::post('servicios/operador', ['as' => 'upload-postoperador', 'uses' =>'ServicioController@postOperadores']);
Route::get('servicios/operadorServicios', 'ServicioController@step3');
=======
Route::post('servicios/operador', ['as' => 'upload-postservicios', 'uses' =>'ServicioController@postOperadores']);

Route::get('step2', 'ServicioController@stepnum2');

Route::post('servicios/servicioOperador', ['as' => 'upload-postServicioOperador', 'uses' =>'UsuarioServiciosController@postServicioOperadores']);

Route::get('/image/{id}', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);


>>>>>>> 2b2485fd2e840ba6cc54134b4a06e834f9d53884
