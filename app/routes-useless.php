	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Pain-killer:(removing trailing slashes from urls)

Route::get('{any}', function($url){
    return Redirect::to(mb_substr($url, 0, -1), 301);
})->where('any', '(.*)\/$');

// Route::get('products', array('as' => 'products', 'uses' => 'ProductsController@getIndex'));
/*
|--------------------------------------------------------------------------
| The API
|--------------------------------------------------------------------------
|
|
|
*/
// Route::get('eventts/api', function(){ return Response::json(['eventts'=> json_decode(Eventt::all())]);});
// Route::get('test', function(){ return All::getSidelink(); });

// Route::get('api', function(){ return All::getRandomRecords(); });
// Route::get('api', function(){ return All::getLatestRecords(); });
Route::get('api', function(){ return All::getAllRecords(); });
Route::post('api', function(){ return All::getCoveredRecords(); });
Route::get('api/search', function(){ return All::ajaxByLetters(); });
Route::get('{path}/api', function($path){ return All::getModelRecords(); });

Route::get('{resource}/{id}/api', function($resource, $id){ 
	return All::getRecord($resource, $id);
})->where('id', '[0-9]+');

Route::get('{resource}/{id}/edit/api', function($resource, $id){ 
	return All::getRecord($resource, $id);
})->where('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Deleting via get Request
|--------------------------------------------------------------------------
|

*/

Route::get('{resource}/{id}/delete', function($resource, $id){
	$record =  All::getRecord($resource, $id);
	if(All::hasEditRight($record)):
		$record = All::getRecord($resource, $id);
		$record->delete();
		return Redirect::route($resource.'.index');
	endif;
})->where('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Starring
|--------------------------------------------------------------------------
|
*/

Route::post('{resource}/{id}/star', function($resource, $id){  //create rights bro

	$record =  All::getRecord($resource, $id);
	return Starring::star($record);

})->where('id', '[0-9]+');


//Static Pages
//-------------------------------------------------------------------------
Route::get('about', 'AboutusesController@index');
Route::get('howitworks', 'HowitworksController@index');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::post('/', 'HomeController@getSearch'); //search
Route::get('search/{query}/{category}/{location}', 'HomeController@search'); //search
Route::get('search/{any}', 'HomeController@simpleSearch'); //search
// Route::get('howitworks', 'HowitworksController@show');

// Route::post('/', function(){ return var_dump(Input::all());});
Route::get('home', 'HomeController@getHome');

Route::get('privacy', function(){ return View::make('privacy');});
Route::get('tos', function(){ return View::make('tos');});
Route::get('contactus', function(){ return View::make('contactus');});
Route::post('contactus', function(){ return All::sendEmail(Input::all());});
Route::post('inquire', function(){ return All::inquire(Input::all());});

//Popup makers
//-------------------------------------------------------------------------

Route::get('/eventts/createpop', function(){return View::make('eventts/createpop');});


// Route::get('suppliers', 'SuppliersController@getIndex');
/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
*/


# Change Email
Route::get('change-email', array('as' => 'change-email', 'uses' => 'AuthorizedController@getChangeEmail'));
Route::post('change-email', 'AuthorizedController@postChangeEmail');

# Change Password
Route::get('change-password', array('as' => 'change-password', 'uses' => 'AuthorizedController@getChangePass'));
Route::post('change-password', 'AuthorizedController@postChangePass');

// indexByUser()
Route::get('user/{id}/eventts', 'EventtsController@indexByUser', compact('id'))->where('id', '[0-9]+');



/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');
	Route::get('facebook', 'OauthController@session');
	Route::get('twitter', 'OauthController@session');
	Route::get('google', 'OauthController@session');
	
	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});


/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
|
*/
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{
	
	Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@getIndex'));
	Route::get('run', array('as' => 'advertisements', 'uses' => 'AdvertisementsController@adminIndex'));
	Route::get('partners', array('as' => 'partners', 'uses' => 'PartnersController@getIndex'));
	Route::get('traffic', 'HomeController@getUsersOnline');

	Route::resource('aboutuses', 'AboutusesController');
	Route::resource('howitworks', 'HowitworksController');


	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));


		Route::get('create', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
		Route::post('create', 'UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'UsersController@getEdit'));
		Route::post('{userId}/edit', 'UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
	});

});

# Group Management
Route::group(array('prefix' => 'groups', 'before' => 'auth'), function()
{
	Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@getIndex'));
	Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@getCreate'));
	Route::post('create', 'GroupsController@postCreate');

	Route::get('{groupId}', array('as' => 'group.show', 'uses' => 'GroupsController@getShow'));
	Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@getEdit'));
	Route::post('{groupId}/edit', 'GroupsController@postEdit');
	Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@getDelete'));
	Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
});



// Route::resource('users', 'UsersController');
Route::get('account', array('as' => 'account', 'before' => 'auth', 'uses' => 'UsersController@getAccount'));

Route::group(array('prefix' => 'users'), function()
{

	Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@getShow'));
	
	Route::group(array('before' => 'auth'), function(){
		Route::get('{userId}/edit', array('as' => 'users.edit', 'uses' => 'UsersController@edit'));
		Route::put('{userId}', array('as' => 'users.update', 'uses' => 'UsersController@postEdit'));
		Route::get('{userId}/messages', array('as' => 'messages/index', 'uses' => 'MessagesController@index'));
	});
	Route::get('products', array('as' => 'products', 'uses' => 'ProductsController@getIndex'));
	Route::get('{userId}/products', array('as' => 'products.by_user', 'uses' => 'ProductsController@byUser'));

	Route::get('companies', array('as' => 'companies', 'uses' => 'CompaniesController@getIndex'));
	Route::get('{userId}/companies', array('as' => 'companies/index', 'uses' => 'CompaniesController@index'));

	Route::get('{userId}/buying_leads', array('as' => 'my_buying_leads', 'uses' => 'Buying_leadsController@byUser'));

	// Route::get('companies', array('as' => 'companies', 'uses' => 'CompaniesController@getIndex'));
	// Route::get('{userId}/companies', array('as' => 'companies/index', 'uses' => 'CompaniesController@index'));
	Route::get('users.companies', array('as' => 'companies', 'uses' => 'UserCompaniesController@getIndex'));
	Route::get('users/{userId}/companies', array('as' => 'companies/index', 'uses' => 'UserCompaniesController@index'));

});

Route::get('myproducts', array('as' => 'my_products', 'before' => 'auth', 'uses' => 'ProductsController@myProducts'));

/*
|--------------------------------------------------------------------------
| Messages management
|--------------------------------------------------------------------------
|
*/


Route::group(array('prefix' => 'messages', 'before' => 'auth'), function(){

	//lists...
	Route::get('received', array('as' => 'messages.received', function(){  //all received
		$messages = Message::inbox();
		return View::make('messages.index', compact('messages'));
	}))->where('id', '[0-9]+');

	Route::get('nonread', function(){  //unread
		$messages = Message::nonread();
		return View::make('messages.index', compact('messages'));
	})->where('id', '[0-9]+');

	Route::get('sent', function(){  //sent
		$messages = Message::sent();
		return View::make('messages.index', compact('messages'));
	})->where('id', '[0-9]+');

	Route::get('starred', function(){  //starred
		$messages = Message::starred();
		return View::make('messages.index', compact('messages'));
	})->where('id', '[0-9]+');

	Route::get('trashed', function(){  //deleted
		$messages = Message::trashd();
		return View::make('messages.index', compact('messages'));
	})->where('id', '[0-9]+');

	//single...

	Route::get('{id}/unread', function($id){  //unread
		return Message::unread($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/star-0', function($id){  //star
		return Message::star($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/star-1', function($id){  //unstar
		return Message::unstar($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/trash-0', function($id){  //delete
		return Message::trash($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/trash-1', function($id){  //restore deleted
		return Message::untrash($id);
	})->where('id', '[0-9]+');

});



/*
|--------------------------------------------------------------------------
| Todos management
|--------------------------------------------------------------------------
|
*/
//actions
Route::group(array('prefix' => 'todos', 'before' => 'admin'), function(){

	Route::resource('/', 'TodosController');
	

	Route::get('{id}/flag-0', function($id){  //flag
		return Todo::flag($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/flag-1', function($id){  //unflag
		return Todo::unflag($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/done-0', function($id){  //done
		return Todo::done($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/done-1', function($id){  //make not done
		return Todo::undone($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/from-tim', function($id){  //done
		return Todo::fromTim($id);
	})->where('id', '[0-9]+');

	Route::get('{id}/from-lee', function($id){  //make not done
		return Todo::fromLee($id);
	})->where('id', '[0-9]+');

});

/*
|--------------------------------------------------------------------------
| Mass Updates
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => 'mass-update', 'before' => 'admin'), function(){

	Route::post('/{resource}', function($resource){ return All::massUpdate($resource); });
	Route::post('/suppliers/{resource}', function($resource){ return All::massUpdateSupplier($resource); });

});
	

/*
|--------------------------------------------------------------------------
| Seed and Empty tables like a Boss
|--------------------------------------------------------------------------
|
*/

Route::get('{table}/seed', array('before' => 'admin', function($table){ 
	if(Sentry::getUser()->hasAccess('admin')):
		DatabaseSeeder::seed($table);
	endif;
	// return var_dump(Sentry::getUser()->hasAccess('admin'));
	return Redirect::to($table);
}));

Route::get('{table}/empty', array('before' => 'admin', function($table){ 
	if(Sentry::getUser()->hasAccess('admin')):
		// return DB::table($table)->get();
		// foreach (DB::table($table)->get() as $record) {
		// 	$record->delete();
		// }
		DB::table($table)->truncate();
		// $model = All::getModel($table);
		// return $model::all();
		// foreach ($model::all() as $record) {
		// 	$record->delete();
		// }
	endif;
	return Redirect::to($table);
}));

/*
|--------------------------------------------------------------------------
| Sandbox
|--------------------------------------------------------------------------
|
*/

Route::get('link', 'TestController');
Route::get('items', 'ProductsController@getItems');
Route::get('item', 'ProductsController@getItem');
Route::get('checkbox', 'CompaniesController@getCheckbox');

Route::get('sandbox', function(){ 
	$path = Request::path();
	$s = "_12";
	return substr($s, 1);
	// return strlen($s);
	// strchr()


	Session::forget('loginRedirect');
	// return Session::get('loginRedirect', 'account');
	// creating relationships
	// DB::table('company_user')->insert(array('user_id'=>1, 'company_id'=>34)); 
	// DB::table('company_user')->insert(array('user_id'=>1, 'company_id'=>32));

	// querying rships


	// return Company::where('creator', 1)->get();
	// return User::first()->companies();
	// $company = Company::find(3);
	// User::find(Sentry::getUser()->id)->companies()->attach(3);
	// return User::find(Sentry::getUser()->id)->companies();
	// return Company::first()->users();

});


/*
|--------------------------------------------------------------------------
| Other Resources
|--------------------------------------------------------------------------
|
*/
Route::group(array('before' => 'auth'), function(){
	Route::resource('messages', 'MessagesController');
	// from:string, to:string, subject:string, body:text, read:boolean, starred:boolean, views:integer, status:string
});
Route::resource('eventts', 'EventtsController');

Route::group(array('before' => 'admin'), function(){
	Route::resource('advertisements', 'AdvertisementsController');
	Route::resource('partners', 'PartnersController');
	Route::resource('testimonials', 'TestimonialsController');
	Route::resource('suppliers', 'SuppliersController');
});

Route::resource('profiles', 'ProfilesController');

Route::resource('products', 'ProductsController');
Route::get('list', 'ProductsController@getProductlist');

// Route::resource('users.company', 'UserCompaniesController');
Route::resource('companies', 'CompaniesController');

Route::resource('catalogues', 'CataloguesController');

Route::get('categories/{name}', 'CategoriesController@showByName');

Route::resource('categories', 'CategoriesController');

Route::resource('counties', 'CountiesController');

Route::resource('buying_leads', 'Buying_leadsController');


// Route::resource('todos', 'TodosController');
// id:increments, title:string, description:text, deadline:string, person:string, done:boolean, flag:boolean

Route::get('business', function(){
	var_dump(All::getBusiness());
});


Route::resource('names', 'NamesController');

	# Partners Management
	Route::group(array('prefix' => 'partners'), function()
	{

		Route::get('create', array('as' => 'create/partner', 'uses' => 'PartnersController@getCreate'));
		Route::post('create', 'PartnersController@postCreate');

		Route::get('{partnerId}', array('as' => 'partner.show', 'uses' => 'PartnersController@getShow'));
		Route::get('{partnerId}/edit', array('as' => 'update/partner', 'uses' => 'PartnersController@getEdit'));
		Route::post('{partnerId}/edit', 'PartnersController@postEdit');
		Route::get('{partnerId}/delete', array('as' => 'delete/partner', 'uses' => 'PartnersController@getDelete'));
		Route::get('{partnerId}/restore', array('as' => 'restore/partner', 'uses' => 'PartnersController@getRestore'));
	});

	# Advertisements Management
	Route::group(array('prefix' => 'advertisements'), function()
	{

		Route::get('/', array('as' => 'advertisements', 'uses' => 'AdvertisementsController@getIndex'));

		Route::get('create', array('as' => 'create/advertisements', 'uses' => 'AdvertisementsController@getCreate'));
		Route::post('create', 'AdvertisementsController@postCreate');

		// Route::get('{advertId}', function(){ var_dump('name'); });
		Route::get('{advertId}', array('as' => 'show/advertisements', 'uses' => 'AdvertisementsController@getShow'));
		Route::get('{advertId}/edit', array('as' => 'edit/advertisements', 'uses' => 'AdvertisementsController@getEdit'));
		Route::post('{advertId}/edit', 'AdvertisementsController@postEdit');
		Route::get('{advertId}/delete', array('as' => 'delete/advertisements', 'uses' => 'AdvertisementsController@getDestroy'));
		Route::get('{advertId}/restore', array('as' => 'restore/advertisements', 'uses' => 'AdvertisementsController@getRestore'));

	});

	# Eventts Management
	Route::group(array('prefix' => 'eventts'), function()
	{
		
		// Route::get('/', array('as' => 'partners', 'uses' => 'EventtsController@getIndex'));

		// Route::get('create', array('as' => 'create/eventts', 'uses' => 'EventtsController@getCreate'));
		// Route::post('create', 'EventtsController@postCreate');
		// // Route::get('store', array('as' => 'create/store', 'uses' => 'AdvertisementsController@getStore'));
		// Route::get('{eventtsId}', array('as' => 'eventts.show', 'uses' => 'EventtsController@getShow'));
		// Route::get('{eventtsId}/edit', array('as' => 'update/eventts', 'uses' => 'EventtsController@getEdit'));
		// Route::post('{eventtsId}/edit', 'EventtsController@postEdit');
		// Route::get('{eventtsId}/delete', array('as' => 'delete/eventts', 'uses' => 'EventtsController@getDelete'));
		// Route::get('{eventtsId}/restore', array('as' => 'restore/eventts', 'uses' => 'EventtsController@getRestore'));
	});
	# Featured Suppliers Management
	Route::group(array('prefix' => 'suppliers'), function()
	{
		// Route::resource('/', 'CompaniesController');
		
		Route::get('create', array('as' => 'create/supplier', 'uses' => 'CompaniesController@getCreate'));
		Route::post('create', array('as' => 'create/post', 'uses' =>  'CompaniesController@postCreate'));
		Route::get('store', array('as' => 'create/store', 'uses' => 'CompaniesController@getStore'));
		
	});

	# Testimonials Management
	Route::group(array('prefix' => 'testimonials'), function()
	{
		
		// Route::get('/', array('as' => 'testimonials', 'uses' => 'TestimonialsController@getIndex'));
		
		Route::get('create', array('as' => 'create/testimonials', 'uses' => 'TestimonialsController@getCreate'));
		Route::post('create', 'TestimonialsController@postCreate');

		Route::get('{testimonialId}', array('as' => 'testimonial.show', 'uses' => 'TestimonialsController@getShow'));
		Route::get('{testimonialId}/edit', array('as' => 'update/testimonial', 'uses' => 'TestimonialsController@getEdit'));
		Route::post('{testimonialId}/edit', 'TestimonialsController@postEdit');
		// Route::get('{advertId}/delete', array('as' => 'delete/advertisements', 'uses' => 'AdvertisementsController@getDestroy'));
		Route::get('{testimonialId}/delete', 'TestimonialsController@getDestroy');
		Route::get('{testimonialId}/restore', array('as' => 'restore/testimonial', 'uses' => 'TestimonialsController@getRestore'));
	});

	Route::get('run', array('as' => 'advertisements', 'uses' => 'AdvertisementsController@adminIndex'));
