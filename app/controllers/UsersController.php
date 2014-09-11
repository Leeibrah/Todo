<?php

// use AdminController;	
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
// use Config;
// use Input;
// use Lang;
// use Redirect;
// use Sentry;
// use Validator;
// use View;

class UsersController extends AdminController {

	/**
	 * Declare the rules for the form validation
	 *
	 * @var array
	 */
	protected $validationRules = array(
		'first_name'       => 'required|min:2',
		'last_name'        => 'required|min:2',
		'email'            => 'required|email|unique:users,email',
		'password'         => 'required|between:3,32',
		'password_confirm' => 'required|between:3,32|same:password',
		// 'password'         => 'between:0,32',
		// 'password_confirm' => 'between:0,32|same:password',
	);

	// @tim // common controller constructor

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	//--------------------Begin From DevsController
	public function getUsers(){

		$users = $this->user->all();

		return View::make('admin.users.index', compact('users'));
	}
	/**
	 * Display the specified resource.
	 *
	 * 
	 *
	 */
	public function getAccount()
	{
		// return var_dump(All::hasEditRight($record));
		if (Sentry::check()):
		
			$id = Sentry::getUser()->id;

			return Redirect::to('users/dashboard');		
		
		else:
			return Redirect::to('auth/signin');
		endif;
	}

	public function dashboard()
	{	
		if(Sentry::check()):
			// $contractors = DB::table('contractors');
			$user = Sentry::getUser();

			return View::make('users.dashboard', compact('user'));
		else:
			return Redirect::to('auth/signin');
		endif;
	}

	// public function getSho($id)
	// {
		// $contractor = DB::table('contractor')->get();


		// if(Sentry::check()):

		//  try {
  //           // $user = $this->user->findOrFail($id);
  //           $user = Sentry::getUser();
  //       } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
  //           $message = 'Invalid User.';
  //           $user = Sentry::getUser();
  //           // $contractor = DB::table('contractor')->get();
  //           // return Redirect::to('users.show')->with('message', $message);
  //           return View::make('users.show', compact('user'));
  //       }

		// $user = $this->user->findOrFail($id);
		// $user = Sentry::findUserById($id);
		// $user = Sentry::getUser();
		// if(All::checkViewRight($user)):
		// 	return All::checkViewRight($user);
		// endif;
	
		// return View::make('users.show', compact('user', 'contractor'));

		// else:
		// 	return Redirect::to('auth/signin');
		// endif;
	// }

	public function getShow($id)
	{
		$user = $this->user->findOrFail($id);
		// $userid = Sentry::getUser()->id;
		// var_dump($userid); die();
		$userid = User::findOrFail($id)->id;
		$useremail = User::findOrFail($id)->email;
		// var_dump($userid); die();
		$galleries = Gallery::where('user_id', '=', $userid)->get();
		$credentials = Credential::where('user_id', '=', $userid)->get();
		$reviews = Review::where('to', '=', $useremail)->get();
		// $services = 
		// $user = sentry::getUser();
		// var_dump($user); die('here');
		// $user = Sentry::findUserById($id);
		// if(All::checkViewRight($user)):
		// 	return All::checkViewRight($user);
		// endif;

		// return $galleries; die();
		// return $reviews; die('jere');

		return View::make('users.show', compact('user', 'galleries', 'reviews'));
		// return View::make('users.show', compact('user'));
	}

	public function getProfile(){

		$user = Sentry::getUser();

		return View::make('users.profile', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit1($id)
	{
		$user = $this->user->find($id);
		// !All::hasEditRight($user) ? die : true;

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}
		if(All::hasEditRight($user)){
			return View::make('users.edit', compact('user'));
		}else{
			return View::make('error.403');
		}

	}

	public function edit($id){

		$user = $this->user->find($id);
		$counties = DB::table('counties')
     		// ->orderBy('name', 'asc')
    		->get();

		if(All::checkEditRight($user)):
			return All::checkEditRight($user);
		endif;

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		return View::make('users.edit', compact('user'));
	}

	public function getFundis(){

		$fundis = User::where('permissions', '!=', 'NULL')->get();
		// $fundis = User::all();

		// return $fundis; 
		$user = Sentry::getUser();
		// $user = Sentry::findUserById($id);
		// $user = $this->contractor->findOrFail($id);

		return View::make('users.fundis', compact('fundis', 'user'));
	}

	//--------------------End From DevsController

	/**
	 * Show a list of all the users.
	 *
	 * @return View
	 */


	public function getIndex()
	{
		// Grab all the users
		// return All::getLorem(20);
		$users = Sentry::getUserProvider()->createModel();
		$user = Sentry::getUser();
		// Do we want to include the deleted users?
		if (Input::get('withTrashed'))
		{
			$users = $users->withTrashed();
		}
		else if (Input::get('onlyTrashed'))
		{
			$users = $users->onlyTrashed();
		}

		// Paginate the users
		$users = $users->paginate()
			->appends(array(
				'withTrashed' => Input::get('withTrashed'),
				'onlyTrashed' => Input::get('onlyTrashed'),
			));
		// return $users;
		// Show the page
		return View::make('admin/users/index', compact('users', 'user'));
	}

	/**
	 * User create.
	 *
	 * @return View
	 */
	public function getCreate()
	{
		// Get all the available groups
		$groups = Sentry::getGroupProvider()->findAll();

		// Selected groups
		$selectedGroups = Input::old('groups', array());

		// Get all the available permissions
		$permissions = Config::get('permissions');
		$this->encodeAllPermissions($permissions);

		// Selected permissions
		$selectedPermissions = Input::old('permissions', array('superuser' => -1));
		$this->encodePermissions($selectedPermissions);

		// Show the page
		return View::make('backend/users/create', compact('groups', 'selectedGroups', 'permissions', 'selectedPermissions'));
	}

	/**
	 * User create form processing.
	 *
	 * @return Redirect
	 */
	public function postCreate()
	{
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $this->validationRules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		try
		{
			// We need to reverse the UI specific logic for our
			// permissions here before we create the user.
			$permissions = Input::get('permissions', array());
			$this->decodePermissions($permissions);
			app('request')->request->set('permissions', $permissions);

			// Get the inputs, with some exceptions
			$inputs = Input::except('csrf_token', 'password_confirm', 'groups');

			// Was the user created?
			if ($user = Sentry::getUserProvider()->create($inputs))
			{
				// Assign the selected groups to this user
				foreach (Input::get('groups', array()) as $groupId)
				{
					$group = Sentry::getGroupProvider()->findById($groupId);

					$user->addGroup($group);
				}

				// Prepare the success message
				$success = Lang::get('admin/users/message.success.create');

				// Redirect to the new user page
				return Redirect::route('update/user', $user->id)->with('success', $success);
			}

			// Prepare the error message
			$error = Lang::get('admin/users/message.error.create');

			// Redirect to the user creation page
			return Redirect::route('create/user')->with('error', $error);
		}
		catch (LoginRequiredException $e)
		{
			$error = Lang::get('admin/users/message.user_login_required');
		}
		catch (PasswordRequiredException $e)
		{
			$error = Lang::get('admin/users/message.user_password_required');
		}
		catch (UserExistsException $e)
		{
			$error = Lang::get('admin/users/message.user_exists');
		}

		// Redirect to the user creation page
		return Redirect::route('create/user')->withInput()->with('error', $error);
	}

	/**
	 * User update.
	 *
	 * @param  int  $id
	 * @return View
	 */
	public function getEdit($id = null)
	{
		try
		{
			// Get the user information
			$user = Sentry::getUserProvider()->findById($id);

			// Get this user groups
			$userGroups = $user->groups()->lists('name', 'group_id');

			// Get this user permissions
			$userPermissions = array_merge(Input::old('permissions', array('superuser' => -1)), $user->getPermissions());
			$this->encodePermissions($userPermissions);

			// Get a list of all the available groups
			$groups = Sentry::getGroupProvider()->findAll();

			// Get all the available permissions
			$permissions = Config::get('permissions');
			$this->encodeAllPermissions($permissions);
		}
		catch (UserNotFoundException $e)
		{
			// Prepare the error message
			$error = Lang::get('admin/users/message.user_not_found', compact('id'));

			// Redirect to the user management page
			return Redirect::route('users')->with('error', $error);
		}

		// Show the page
		return View::make('backend/users/edit', compact('user', 'groups', 'userGroups', 'permissions', 'userPermissions'));
	}

	/**
	 * User update form processing page.
	 *
	 * @param  int  $id
	 * @return Redirect
	 */
	public function postEdit($id = null)
	{
		// We need to reverse the UI specific logic for our
		// permissions here before we update the user.
		$permissions = Input::get('permissions', array());
		$this->decodePermissions($permissions);
		app('request')->request->set('permissions', $permissions);

		try
		{
			// Get the user information
			$user = Sentry::getUserProvider()->findById($id);
		}
		catch (UserNotFoundException $e)
		{
			// Prepare the error message
			$error = Lang::get('admin/users/message.user_not_found', compact('id'));

			// Redirect to the user management page
			return Redirect::route('users')->with('error', $error);
		}

		//
		// $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";
		$this->validationRules['email'] = "email|unique:users,email,{$user->email},email";

		// Do we want to update the user password?
		if ( ! $password = Input::get('password'))
		{
			unset($this->validationRules['password']);
			unset($this->validationRules['password_confirm']);
			#$this->validationRules['password']         = 'required|between:3,32';
			#$this->validationRules['password_confirm'] = 'required|between:3,32|same:password';
		}

		// Create a new validator instance from our validation rules
		$input = array_except(Input::all(), '_method');
		$validator = Validator::make($input, $this->validationRules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		
	
		try
		{

			

			// Update the user
			$user->first_name  = Input::get('first_name');
			$user->last_name   = Input::get('last_name');
			$user->image       = Input::get('image');
			$user->phone       = Input::get('phone');
			$user->about       = Input::get('about');
			// $user->image    = Input::get('');
			$user->address     = Input::get('address');
			$user->services    = Input::get('services');
			$user->location    = Input::get('location');
			$user->public      = Input::get('public');
			$user->activated   = Input::get('activated', $user->activated);
			$user->permissions = Input::get('permissions');

			//updating profile image
			if (Input::hasFile('image')) {
				$file            = Input::file('image');
				$destinationPath = public_path().'/uploads/users/image/';
				$filename        = str_random(6) . '_' . $file->getClientOriginalName();
				$uploadSuccess   = $file->move($destinationPath, $filename);
				$user->image     = $filename;
			}


			// Do we want to update the user password?
			if ($password)
			{
				$user->password = $password;
			}

			// Get the current user groups
			$userGroups = $user->groups()->lists('group_id', 'group_id');

			// Get the selected groups
			$selectedGroups = Input::get('groups', array());

			// Groups comparison between the groups the user currently
			// have and the groups the user wish to have.
			$groupsToAdd    = array_diff($selectedGroups, $userGroups);
			$groupsToRemove = array_diff($userGroups, $selectedGroups);

			// Assign the user to groups
			foreach ($groupsToAdd as $groupId)
			{
				$group = Sentry::getGroupProvider()->findById($groupId);

				$user->addGroup($group);
			}

			// Remove the user from groups
			foreach ($groupsToRemove as $groupId)
			{
				$group = Sentry::getGroupProvider()->findById($groupId);

				$user->removeGroup($group);
			}

			// Was the user updated?
			if ($user->save())
			{
				// Prepare the success message
				$success = Lang::get('admin/users/message.success.update');

				// Redirect to the user page
				return Redirect::route('users.update', $id)->with('success', $success);
			}

			// Prepare the error message
			$error = Lang::get('admin/users/message.error.update');
		}
		catch (LoginRequiredException $e)
		{
			$error = Lang::get('admin/users/message.user_login_required');
		}

		// Redirect to the user page
		return Redirect::route('update/user', $id)->withInput()->with('error', $error);
	}

	/**
	 * Delete the given user.
	 *
	 * @param  int  $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		try
		{
			// Get user information
			$user = Sentry::getUserProvider()->findById($id);

			// Check if we are not trying to delete ourselves
			if ($user->id === Sentry::getUser()->id)
			{
				// Prepare the error message
				$error = Lang::get('admin/users/message.error.delete');

				// Redirect to the user management page
				return Redirect::route('users')->with('error', $error);
			}

			// Do we have permission to delete this user?
			if ($user->isSuperUser() and ! Sentry::getUser()->isSuperUser())
			{
				// Redirect to the user management page
				return Redirect::route('users')->with('error', 'Insufficient permissions!');
			}

			// Delete the user
			$user->delete();

			// Prepare the success message
			$success = Lang::get('admin/users/message.success.delete');

			// Redirect to the user management page
			return Redirect::route('users')->with('success', $success);
		}
		catch (UserNotFoundException $e)
		{
			// Prepare the error message
			$error = Lang::get('admin/users/message.user_not_found', compact('id' ));

			// Redirect to the user management page
			return Redirect::route('users')->with('error', $error);
		}
	}

	/**
	 * Restore a deleted user.
	 *
	 * @param  int  $id
	 * @return Redirect
	 */
	public function getRestore($id = null)
	{
		try
		{
			// Get user information
			$user = Sentry::getUserProvider()->createModel()->withTrashed()->find($id);

			// Restore the user
			$user->restore();

			// Prepare the success message
			$success = Lang::get('admin/users/message.success.restored');

			// Redirect to the user management page
			return Redirect::route('users')->with('success', $success);
		}
		catch (UserNotFoundException $e)
		{
			// Prepare the error message
			$error = Lang::get('admin/users/message.user_not_found', compact('id'));

			// Redirect to the user management page
			return Redirect::route('users')->with('error', $error);
		}
	}

}
