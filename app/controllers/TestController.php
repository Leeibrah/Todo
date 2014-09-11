<?php

class TestController extends BaseController {

	/**
	 * Eventt Repository
	 *
	 * @var Eventt
	 */

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $eventts = $this->eventt->orderBy('created_at', 'desc')->paginate(10);

		// return Side_Links::getSidelink();
		// echo $link;
	}

	public function getItem(){
		
	}

	public function getProdlist(){
		$user = Sentry::getUser()->id;
		// $content = View::make('backend.widgets.prodlist');
		// return View::make('backend.general', compact('content'));
		return View::make('backend.widgets.prodlist');

	}

	public function getRecords(){

		$records = All::getAllRecords();

		return $records;
	}

	public function permissions(){

		$data = User::find(1);
		$roles = DB::table('users', '=', '1')->lists('activated');

		$rows = DB::table('users')->where('id', 2)->lists('activated');

		// $user = User::where('contractor', '1');

		return $rows;
	}
}