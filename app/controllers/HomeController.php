<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
			$user = Sentry::getUser();
			
			return View::make('home');
					
	}

	public function getHome()
	{
		if (Sentry::check()){
			$user = Sentry::getUser();

			return Redirect::to('/', compact('user'));
			// return $user;
		}else{
			return View::make('home');
		}
	}

	public function base(){

		if (Sentry::check()){
			$user = Sentry::getUser();

			return Redirect::to('users/dashboard', compact('user'));
			// return $user;
		}else{
			return View::make('account.base');
		}
	}

	
}