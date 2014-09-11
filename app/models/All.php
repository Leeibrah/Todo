<?php

class All extends Eloquent {

	public static function getName($record)
	{
		$table = All::tableName($record);
		$name =  $table == 'users' ? $record->first_name . ' ' . $record->last_name : $record->name;
		return $name;
	}

	public static function getNameLink($record)
	{
		$table = All::tableName($record);
		return link_to_route("$table.show", All::getName($record), $record->id);
		// return $record->name;
	}

	public static function getNameFromEmail($email){

		$user = User::where('email', $email)->pluck('first_name');
		$retry = User::select('first_name','last_name')->where('email', $email)->get();
		// $user = 'first_name'.' '.'last_name';
		return $user;
	}

	public static function getImageFromEmail($email){

		$image = User::where('email', $email)->pluck('image');

		return $image;
	}

	/*
	|--------------------------------------------------------------------------
	| View Rights - Enforcing authorized access only
	|--------------------------------------------------------------------------
	|
	*/
	public static function getContractorName($record)
	{
		$table = All::tableName($record);
		$name =  $table == 'contractors' ? $record->first_name . ' ' . $record->last_name : $record->name;
		return $name;
	}


	public static function checkViewRight($record){
		if(!isset($record)){ //record is not available
			// return View::make('error.404');
			Log::error($exception);
		}
		
		if($record->public == 'off' && !All::hasEditRight($record)){ //record publicity has been turned off and you have no rights
			Session::put('loginRedirect',  Request::path()); // laravel magic
			return View::make('error.403');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Create Rights
	|--------------------------------------------------------------------------
	|
	*/

	public static function checkCreateRight(){
		if(!Sentry::check()){ 
			Session::put('loginRedirect',  Request::path()); // laravel magic
			return Redirect::route('signin')
			->with('info', 'You have to log in to perform that action...');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Edit Rights
	|--------------------------------------------------------------------------
	|
	*/
	
	public static function hasAdminRight($record){

		//Change this to suit only the admin  -- I haded this but you can alter with the code
		// hasaccess
		if(!Sentry::check()){
			return false;
		}
		if(All::getCreator($record) == Sentry::getUser()->id || Sentry::getUser()->hasAccess('admin')){
			return true;
		}
		else{
			return false;
		}
	}

	public static function hasEditRight($record){
		if(!Sentry::check()){
			return false;
		}
		if(All::getCreator($record) == Sentry::getUser()->id || Sentry::getUser()->hasAccess('admin')){
			return true;
		}
		else{
			return false;
		}
	}

	public static function checkEditRight($record){
		if(!Sentry::check()){ 
			Session::put('loginRedirect',  Request::path()); // laravel magic
			return Redirect::route('signin')
			->with('info', 'You have to log in to perform that action...');
		}
		if(!isset($record)){ //record is not available
			// return View::make('error.404');
			Log::error($exception);
		}
		if($record->public == 'off' && !All::hasEditRight($record)){ //record publicity has been turned off and you have no rights
			return View::make('error.403');
		}
	}

	public static function getEditLink($record){
		if(All::hasEditRight($record)):
			return link_to_route(All::tableName($record).'.edit', 'Edit', 
				array($record->id), array('class' => 'btn btn-sm btn-info _inline'));
		endif;
	}

	public static function getNamedEditLink($record, $name)
	{
		$table = All::tableName($record);
		return link_to_route("$table.edit", $name, $record->id);
		// return $record->name;
	}

	public static function getDeleteLink($record){
		if(All::hasEditRight($record)):
			if($record->model == 'User' && ($record->id == 1  || $record->id == 2)):
				$button = '';
			else:
				$button = "<button class=\"btn btn-sm btn-link _del\" >Delete</button>";
			endif;
			//prevented deleting my account by accident.

			// $table = All::tableName($record);
            // return "<a alt=\"./$table/$record->id/delete\" class=\"btn-sm btn-warning _inline _black\" >Delete</a>";
            return $button;
		endif;
	}

	public static function adminLink($classes){
		if(Sentry::check()):
			if(Sentry::getUser()->hasAccess('admin')):
				return link_to_route('admin', 'Admin', null, array('class' => $classes));
			endif;
		endif;
	}

	public static function getLogoutLink(){
		if(Sentry::check()):
			if(Request::path() == 'users/'.Sentry::getUser()->id):
				return link_to_route('logout', 'Logout', null, array('class' => 'btn btn-sm btn-primary _inline'));
				// return Request::path();
			endif;
		endif;
	}

	public static function tableName($record){
		$class = strtolower(get_class($record));// sometimes getclass -> stdClass
		// $class = strtolower(All::getModel($record));
		$cname = $class == 'cartalyst\sentry\users\eloquent\user' ? 'user' : $class;
		if(substr($cname, strlen($cname)-1, strlen($cname)) == 'y'){ //check for singulars ending with 'y'
			$table = substr($cname, 0, strlen($cname) -1).'ies';
			// $table = substr($cname, strlen($cname)-1, strlen($cname));
		}
		else{
			$table = $cname.'s';
		}
		return $table;
	}

	public static function getCreator($record){
		$creator = get_class($record) == 'Message' ? User::where('email', $record->to)->first()->id : $record->organizer; //For messages to unread
		$creator = $record->creator ? $record->creator : $creator; //For eventts
		$creator = $record->user_id ? $record->user_id : $creator; //For One to many relationships
		$creator = get_class($record) == 'User' ? $record->id : $creator; //For users
		$creator = !User::find($creator) ? 2 : $creator;
		return $creator;
	}

	public static function getCreatorLink($record){
		$c = User::find(All::getCreator($record));
		return link_to_route("users.show", All::getName($c), $c->id);
	}

	public static function getCreatorImageLink($record, $classes){
		$user_id = All::getCreator($record);
		$user = User::find($user_id);
		return $img = All::getImageLink($user, 'image', $classes);
		// return "<a href=\"/users/$user_id\">$img</a>";
	}

	public static function getPublicity($record){
		if(All::hasEditRight($record)):
			return $record->public == 'on' ? 'Public' : 'Not Public';
		endif;
	}

	public static function getUpload($record, $field){
		$table = All::tableName($record);
		// return $table;
		// return $field;
		$name = $record->$field;

		if(empty($name)):
			$name = 'no_'.$field.'.png';
		endif;

		return "/uploads/$table/$field/$name";
	}
	public static function tempImage($table, $field){
		return "/uploads/$table/$field/no_$field.jpg";
	}

	public static function getImageLink($record, $field, $classes){
		$table = All::tableName($record);

		// $img = All::getImage($record);
		$img = All::getUpload($record, $field);

		$i_link = "$table/$record->id";
		$i_link = $table == 'eventts' || $table == 'stories' ? "users/".All::getCreator($record) : $i_link; //using creator pic for eventts and stories


		if($img == '/images/users/user.png' || $img == '/images/symbols/star.gif'):
			$classes = $classes.' _fade-3';
			$img_link = "<a href=\"/$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
			
			if(All::hasEditRight($record)):
				return $img_link."<script> myalert = 'Add an image to " . All::getNamedEditLink($record, All::getName($record)) . "' </script>";
			endif;
		endif;
		// return var_dump($classes);

		return "<a href=\"/$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
	}

	public static function getMapMessage($record){
		if(All::hasEditRight($record) && empty($record->map)):
            return All::getNamedEditLink($record, 'Pin Your Headquaters On The Map!');
		endif;
	}

	public static function getTagline($record){ //not called/used for stories
		if(All::hasEditRight($record) && empty($record->elevator)):
            return All::getNamedEditLink($record, 'Add your tagline here...');
        elseif(empty($record->elevator)):
        	return '';
        else:
        	return $record->elevator;
		endif;
	}


	public static function getContent($record){ //not called/used for stories
		$content = get_class($record) == 'Story' ? $record->body : $record->description;
		$content = get_class($record) == 'User' ? $record->about : $content;

		if(All::hasEditRight($record) && empty($content)):
            return All::getNamedEditLink($record, 'Add some content here... '); //. All::getLorem(10)
        elseif(empty($content)):
        	return 'Nothing here yet...'; //All::getLorem(10);
        else:
        	return $content;
		endif;
	}

	public static function getLocation($record){ //not called/used for stories
		if(All::hasEditRight($record) && empty($record->location)):
            return All::getNamedEditLink($record, ''); //Elysium or Oblivion...
        elseif(empty($record->location)):
        	return ''; //Elysium
        else:
        	return $record->location;
		endif;
	}

	public static function getContacts($record){ 
		if(get_class($record) == 'User'):

			$contacts_arr = array();
			
			!empty($record->email) ? array_push($contacts_arr, "Email: $record->email") : true;
			!empty($record->phone) ? array_push($contacts_arr, "Phone: $record->phone") : true;
			// array_push($contacts_arr, "Website:");

			$contacts = empty($record->contacts) ? implode("<br/><br/>", $contacts_arr) : $record->contacts;
			$contacts = '<p>'.$contacts.'</p>';

			if(stripos(Request::path(), 'edit')): //no script for user/id/edit
        		return $contacts;
        	endif;

        else:
        	return $record->contacts;
		endif;
	}

	public static function getModel($table){  //edit rights bro
		if($table == ('companies')){ //check for weird plurals to resolve singular
			$model = ucwords(substr($table, 0, strlen($table) -3).'y');
		}
		else{
			$model = ucwords(substr($table, 0, strlen($table) -1));
		}
		return $model;
	}
	
	public static function getRecord($table, $id){ 
		$model = All::getModel($table); // also $model = get_class($record); // no query
		$record =  $model::find($id);//queries db
		// $record = All::formatRecord($record);
		return $record;
	}

	public static function formatRecord($record){ //1 query
		$record->name = All::getName($record);//doesnt query db
		$record->model = get_class($record);
		$record->model_path = All::tableName($record);// doesnt query db
		$record->model_count = All::getModelCount($record);//queries db

		//removing sensitive fields 

		unset($record->permissions);
		unset($record->activated);
		unset($record->activation_code);
		unset($record->activated_at);
		unset($record->last_login);
		unset($record->persist_code);
		unset($record->reset_password_code);
		unset($record["last_map"]);
		unset($record["views"]);
		unset($record["votes"]);
		unset($record["notes"]);
		unset($record["status"]);

		return $record;
	}
	 public static function simplify($record){
		$r = array();
		$r['business_name'] = $record['business_name'];
		$r['id'] = $record['id'];
		$r['map'] = $record['map'];
		return json_encode($r);
    }

    public static function getCoordinates(){

    }

    
	public static function getModelCount($record){ 
		$table = All::tableName($record);//no query
		$model = get_class($record); //All::getModel($table);//no query
		return $model::all()->count();//query
	}

	public static function getLorem($length){ //not called/used for stories
		$str = 'Lorem ipsum pretium mollitia praesentium malesuada fames, 
			beatae viverra molestias ultricies donec enim? Purus ad reprehenderit conubia malesuada a corrupti 
			commodo neque feugiat harum nibh, 
			velit conubia! Ipsam reiciendis? Diam phasellus, 
			ullam mus ducimus accusamus tempor a ac phasellus aliquip, 
			sapien wisi leo augue iste dui. Consequat ante. Et! Volutpat sem ea elementum tempus dolorum labore autem, 
			purus, iste lacinia eros dolores ut eros anim reprehenderit curabitur accusamus imperdiet repudiandae, 
			blandit? Eos scelerisque, explicabo facilisi architecto wisi, iure, 
			debitis in mauris natus minus quis nullam. Odio, impedit, 
			curabitur arcu. Pharetra minus. Aperiam! Amet sint cupidatat repudiandae aspernatur deleniti felis? 
			Distinctio vehicula! Eaque aute a odit! Natus eos quasi natus pellentesque ducimus, 
			labore! Doloremque inventore eligendi velit, 
			tellus malesuada deleniti luctus nec laborum fugiat mauris earum commodo, 
			magnis lorem proin suspendisse. Aenean. Laudantium praesent. Nostrud. Vehicula reprehenderit, 
			ante ante iaculis faucibus provident class sint etiam anim etiam quae vulputate autem, 
			totam scelerisque iste pariatur rhoncus, 
			minus accusantium quos. Molestiae aliqua occaecat pellentesque sapiente exercitationem 
			minima dictumst? Wisi donec repellat voluptas, lacinia iaculis, commodi, dolorem, 
			litora illum, tortor eu. Debitis exercitationem laudantium viverra, accumsan netus ut veniam, 
			sollicitudin repellat, modi incidunt ipsa, molestias, 
			earum habitasse, morbi voluptatibus interdum lacus. Officia? 
			Nonummy? Perferendis officia. Wisi potenti suspendisse, 
			leo massa esse duis. Orci architecto odit mus dicta metus nulla voluptas potenti exercitationem 
			quis hendrerit minim ac reprehenderit. Inceptos? Molestiae, possimus at, 
			metus explicabo pretium conubia assumenda! Platea occaecat, 
			pulvinar facilisi? Officiis unde? Tenetur, 
			lorem tortor ratione? Aute placeat. Molestiae eleifend, 
			quidem feugiat, 
			magna ultricies? Adipisci aperiam imperdiet a, 
			quas itaque? Ornare aliquet nostra accumsan, 
			per diam! Ac, 
			fames nemo laudantium? Architecto fugit nemo! Deserunt. Dolor dignissim. Occaecat illo natus tempore. 
			Beatae occaecati tristique vehicula? Laboris dolorem quaerat occaecat, 
			neque quae debitis incidunt, 
			fuga ligula! Incidunt do porro tenetur tenetur, 
			nisl nascetur animi hymenaeos.';
		$words = explode(" ", $str);
		// return $words;
		// $count = count($words);
		// $shuffled = array_push($shuffled, $words[array_rand($words)]);
		shuffle($words); 
		$set = array_splice($words, 0, $length);
		$set = implode(' ', $set);
		$sexy =  preg_replace_callback('/([.!?])\s*(\w)/', function ($matches) {
				    return strtoupper($matches[1] . ' ' . $matches[2]);
				}, ucfirst(strtolower($set)));
		return $sexy;
	}

    public static function completePosting(){
		$pending_posts = array(
			Eventt::where('status', session_id())->get()
		);
		$last_record = array();
		foreach ($pending_posts as $source) {
			foreach ($source as $r) {
				$r->status = '';
				$creator = $r->creator ? 'creator' : 'organizer';
				$r->$creator = Sentry::getUser()->id;
				$r->public = 'on';
				$r->save();
				$last_record =  $r;
			};
		}
		return !empty($last_record) ? All::tableName($last_record)."/$last_record->id" : '';
    }


	public static function ajaxByLetters() {
        $term = Input::get('term');
        $api = All::getAllRecords();

        // $api = substr($term, 1) ? $api : $this->getAllRecords();//query only once

        $coll = array();
       
	        foreach ($api as $key => $record) {
	        	foreach ($record as $key => $field) {
	        		if(count($coll)< 10):
						if(stripos('x'.$field, $term)): //stripos starts at char 1 not 0

							$coll[$record['model_path'].$record['id']] = array(
								'model' => $record['model'],
								'model_path' => $record['model_path'],
								'name' => $record['name'],
								'id' => $record['id'],
								'location' => $record['location'],
								'field' => $key
								);

						endif;
	        		endif;
	        	}
	        }
       
        return Response::json($coll);
    }

    public static function getAllRecords(){ 
		$sources = array(
			Contractor::where('status', '!=', 'deleted')->get(),
			Review::where('status', '!=', 'deleted')->get(),
			Service_request::all(),
			// DB::table('service_requests')->get(),
			Lead::where('status', '!=', 'deleted')->get(),
			User::where('status', '!=', 'deleted')->get()
			);

		$sources_array = array();
		$names_arr = array();
		foreach ($sources as $source) {
			$source->last()->latest = 'Latest '.get_class($source->last());
			foreach ($source as $record) {
				All::formatRecord($record);
			};
			// $source->first()->classname = get_class($source->first());
			array_push($sources_array, json_decode($source, TRUE));
			array_push($names_arr, get_class($source->first())); 
		}
		$big_arr = array_merge(
				$sources_array[0], 
				$sources_array[1], 
				$sources_array[2],
				$sources_array[3],
				$sources_array[4]
			);

		// return $names_arr;
		return $big_arr;
	}
    // Function by Lee
 //    public static function getSidelink(){

	// 	$id = Sentry::getUser()->id;
	// 	$view = Request::segment(1);

	// 	$link = "users/".$id."/".$view;

	// 	return $link;
		
	// }
	public static function getCategories(){
		$categories = array();
		foreach (Category::all() as $category) {
			$categories[$category->name] = $category->name;
			// array_push($categories, array($category->name => $category->name));
		}
		return $categories;
	}

	public static function getCounties(){
		$counties = array();
		foreach (County::all() as $county) {
			$counties[$counties->name] = $counties->name;
			array_push($counties, array($county->name => $county->name));
		}
		return $counties;
	}

	public static function getCountie(){
		$counties = DB::table('counties')->get();				

		foreach (County::all() as $county)
		{
		   $counties =$county -> name;
		}
		return $counties;
	}

	public static function getBusiness(){
		$list = array(
			'Agent',
			'Distributor',
			'Importer',
			'Service Trade',
			'Wholesaler',
			'Buying Office',
			'Exporter',
			'Manufacturer',
			'Trading Company'
			);
		
		// $business = array();
		// for ($i = 0; $i<count($list) ; $i++) {
		// 	array_push($counties, array(
		// 	'name' => $list[$i]
		// 	));
		// }

		return $list;
	}

	public static function getExcerpt($msg, $length){
		return $excerpt = substr($msg, 0, $length).'...';
	}
	public static function f(){
		return "/flatlab/frontend/template_content/";
	}
	public static function b(){
		return "/flatlab/backend/template_content/";
	}
	public static function upload($input, $table, $field){ 
	//e.g All::upload('eventts', 'image');
		// return var_dump(Input::all());
		// return var_dump(Input::hasFile($field));
		// if (Input::hasFile($field)) {
			$file            = Input::file($field);
			$destinationPath = public_path().'/uploads/'.$table.'/'.$field;
			$filename        = str_random(6) . '_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $filename);
			return $filename;
		// }
		// else{
			return 'no image';
		// }
	}

	public static function reviews(){
		$reviews = 2+7;
		return $reviews;
	}

	public static function getYear(){
		$years = array();
		foreach (range(1990, 2014) as $key => $year) {
			$years[] = $year;
		}
		array_unshift($years, 'Select Year');
		return $years;
		
		// $business = array();
		// for ($i = 0; $i<count($list) ; $i++) {
		// 	array_push($counties, array(
		// 	'name' => $list[$i]
		// 	));
		// }
	}

	
	public static function sendEmail($input){
		Mail::send('emails.simple', $input, function($message)
		{
            $email = $_POST['email'];
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];

            // $message->from(array($email => $name));
            $message->from(array($email => $name));   
            $message->to(array('admin@mafundis.com' => 'Mafundis Ltd'));   
            $message->subject($subject); 
            $message->setBody($body); 
		});
        return Redirect::back()->with('success', 'Thank You for your Message!');

	}

	
	public static function inquire($input){

		// var_dump('inquire'); die();
		if(Sentry::check()):
			if($input['to'] == Sentry::getUser()->email):
				return Redirect::back()->with('info', 'You cannot send an inquiry to yourself!');
			elseif($input['body'] == ""):
				return Redirect::back()->with('info', 'You have to fill in the body!');
			else:
				$input['from'] = Sentry::getUser()->email;
				$message = Message::create($input);
				return Redirect::route('messages.show', $message->id)->with('success', 'Message Successfully Sent!');
			endif;
		else: //from the modal
			if($input['body'] == ""):
				return Redirect::back()->with('info', 'You have to fill in the body!');
			else:
				$input['from'] = session_id();
				$input['status'] = 'pending';
				$message = Message::create($input);
			endif;
		endif;

	}

	public static function sendreview($input){

		// var_dump(Request::segment(2)); die();
		if(Sentry::check()):
			if($input['to'] == Sentry::getUser()->email):
				return Redirect::back()->with('info', 'You cannot send an inquiry to yourself!');
			elseif($input['subject'] == ""):
				return Redirect::back()->with('info', 'You have to fill in the body!');
			else:
				$input['from'] = Sentry::getUser()->email;
				$input['score'] = 5;
				$review = Review::create($input);
				return Redirect::route('reviews.show', $review->id)->with('success', 'Review Successfully Sent!');
				// $reviews = Review::where('to', '=', $input['from']);
				// return Redirect::route('users.show', $review->id, compact('reviews')); //return Redirect::route('signin')
			endif;
		else: //from the modal
			// if($input['subject'] == ""):
			// 	return Redirect::back()->with('info', 'You have to fill in the body!');
			// else:
			// 	$input['from'] = session_id();
			// 	$input['from'] = Sentry::getUser()->email;
			// 	$input['status'] = 'pending';
			// 	$review = Review::create($input);
			// endif;
			$message = 'You have to sign In to Submit a Review';
			// return Redirect::back()->with('success', $message);
			return Redirect::route('signin');
		endif;

	}

	public static function massUpdate($resource){
		$records = Input::all();
		foreach ($records as $key => $value) {
			$value = $value == 'on' ? 1 : 0;
			$m = All::getModel($resource);
			$rec = $m::find(substr($key, 1));
			$rec->update(array('public' => $value));
		}
		return Redirect::to($resource)->with('success', ucwords($resource).' successfully updated!');
	}

	public static function massUpdateSupplier($resource){

		$records = Input::all();
		foreach ($records as $key => $value) {
			$value = $value == 'on' ? 1 : 0;
			$m = All::getModel($resource);
			$rec = $m::find(substr($key, 1));
			$rec->update(array('featured' => $value));
		}
		return Redirect::to('suppliers')->with('success', ucwords($resource).' successfully updated!');
	}

	public static function convertDate($timestamp){

		$date = date('F/j/Y',strtotime($timestamp));

		return $date;
	}

	public static function split($string){

		// $string = "name, email, address";
		// var_dump($string); die();
		// $parts = explode(',', $string);
		// $data="How to split, a string, using explode"; 
		$splittedstring=explode(",",$string); 

		foreach ($splittedstring as $key => $value) {
			 echo "<span class="."label label-primary>".$value."</span>"; 
		}

	}

	public static function forge($int){

		$result = $int + 11;

		return $result;
	}
}

