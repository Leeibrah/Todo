<?php

class AdminController extends AuthorizedController {

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Apply the admin auth filter
		// $this->beforeFilter('admin-auth'); //@tim
	}

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	
	public function getIndex()
	{
		// Show the page
		// return View::make('backend/dashboard');
		$id = Sentry::getUser()->id;
		// $user = Sentry::getUser()->id();

		

		if(Sentry::check()):
			

			$user = Sentry::getUser();
			// $allusers = DB::table('users')->get();
			// // var_dump($allusers); 
			// // $counties = $this->county->all();
			// $user_count  = DB::table('users')->count();
			// $suppliers_count  = DB::table('companies')->where('featured', '=', '1')->count();
			// $events_count  = DB::table('eventts')->count();
			// $ads_count  = DB::table('eventts')->count();
			// $testimonials_count  = DB::table('eventts')->count();
			// $partners_count  = DB::table('companies')
			// ->where('id', '=', '1')
			// ->count();
			// // $users = User::where('votes', '>', 100)->take(10)->get();

			// $content = View::make("admin.dashboard", array(			
			// 	'user_count' => $user_count, 
			// 	'suppliers_count' => $suppliers_count,
			// 	'events_count' => $events_count,
			// 	'ads_count' => $ads_count,
			// 	'testimonials_count' => $testimonials_count,
			// 	'partners_count' => $partners_count,
			// 	'allusers' => $allusers,
			// 	'user' => $user
			// 	));
			// return View::make("admin.content", compact('content', 'allusers', 'user', 'user_count', 'suppliers_count', 'events_count', 'ads_count', 'testimonials_count', 'partners_count'));
			return View::make("admin.dashboard", compact('user'));
		else:
			return Redirect::to('auth/signin');
		endif;
	}

	/**
	 * Encodes the permissions so that they are form friendly.
	 *
	 * @param  array  $permissions
	 * @param  bool   $removeSuperUser
	 * @return void
	 */
	protected function encodeAllPermissions(array &$allPermissions, $removeSuperUser = false)
	{
		foreach ($allPermissions as $area => &$permissions)
		{
			foreach ($permissions as $index => &$permission)
			{
				if ($removeSuperUser == true and $permission['permission'] == 'superuser')
				{
					unset($permissions[$index]);
					continue;
				}

				$permission['can_inherit'] = ($permission['permission'] != 'superuser');
				$permission['permission']  = base64_encode($permission['permission']);
			}

			// If we removed a super user permission and there are
			// none left, let's remove the group
			if ($removeSuperUser == true and empty($permissions))
			{
				unset($allPermissions[$area]);
			}
		}
	}

	/**
	 * Encodes user permissions to match that of the encoded "all"
	 * permissions above.
	 *
	 * @param  array  $permissions
	 * @return void
	 */
	protected function encodePermissions(array &$permissions)
	{
		$encodedPermissions = array();

		foreach ($permissions as $permission => $access)
		{
			$encodedPermissions[base64_encode($permission)] = $access;
		}

		$permissions = $encodedPermissions;
	}

	/**
	 * Decodes user permissions to match that of the encoded "all"
	 * permissions above.
	 *
	 * @param  array  $permissions
	 * @return void
	 */
	protected function decodePermissions(array &$permissions)
	{
		$decodedPermissions = array();

		foreach ($permissions as $permission => $access)
		{
			$decodedPermissions[base64_decode($permission)] = $access;
		}

		$permissions = $decodedPermissions;
	}

}
