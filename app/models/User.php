<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array(
		// 'id',
		'email',
		'password',
		'permissions',
		'activated',
		// 'activation_code',
		// 'activated_at',
		// 'last_login',
		// 'persist_code',
		// 'reset_password_code',
		'first_name',
		'last_name',
		// 'created_at',
		// 'updated_at',
		'pic',
		'phone',
		'about',
		'location',
		'map',
		'public',
		'views',
		'status',
		'stars',
		// 'deleted_at'
	);


		
	protected $softDelete = true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function profiles() //relationship
	{
		return $this->hasMany('Profile');
	}

	public function companies() //relationship
	{
		return $this->BelongsToMany('Company')->get();
		// return Company::where('creator', $this->id)->get();
	}

	public function messages() //relationship
	{
		// return $this->hasMany('Message')->get();
		return Message::where('from', $this->email)->orWhere('to', $this->email)->get();
	}

	public function products() //relationship
	{
		return $this->hasMany('Product');
	}

	public function catalogues() //relationship
	{
		return $this->hasMany('Catalogue')->get();
	}

	public function buying_lead() //relationship
	{
		return $this->hasMany('Buying Lead');
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}