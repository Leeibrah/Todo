<?php



# Login
Route::get('login', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
Route::post('login', 'AuthController@postSignin');

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
/*
|--------------------------------------------------------------------------
| Starring
|--------------------------------------------------------------------------
|
*/

// Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));



Route::group(array('prefix' => 'auth'), function()
{

	
	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	Route::get('csignup', array('as' => 'csignup', 'uses' => 'AuthController@getFundiSignup'));
	Route::post('csignup', 'AuthController@postFundiSignup');

	// # Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));

	

});

// Route::resource('users', 'UsersController');
Route::group(array('prefix' => 'user', 'before' => 'auth'), function()
{

	Route::resource('todos', 'TodosController');
	Route::get('todos', array('as' => 'todos.index', 'uses' => 'TodosController@index'));

});

