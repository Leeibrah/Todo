<?php

class Todo extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'content' => 'required',
		'status' => 'required',
		'user_id' => 'required'
	);
}
