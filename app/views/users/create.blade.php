@extends('layouts.fundi')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
	<ul>
        <li>
            {{ Form::label('firstname', 'Firstname:') }}
            {{ Form::text('firstname') }}
        </li>

        <li>
            {{ Form::label('lastname', 'Lastname:') }}
            {{ Form::text('lastname') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('permissions', 'Permissions:') }}
            {{ Form::text('permissions') }}
        </li>

        <li>
            {{ Form::label('activated', 'Activated:') }}
            {{ Form::checkbox('activated') }}
        </li>

        <li>
            {{ Form::label('activation_code', 'Activation_code:') }}
            {{ Form::text('activation_code') }}
        </li>

        <li>
            {{ Form::label('last_login', 'Last_login:') }}
            {{ Form::text('last_login') }}
        </li>

        <li>
            {{ Form::label('reset_password', 'Reset_password:') }}
            {{ Form::text('reset_password') }}
        </li>

        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::text('image') }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone') }}
        </li>

        <li>
            {{ Form::label('about', 'About:') }}
            {{ Form::textarea('about') }}
        </li>

        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::checkbox('public') }}
        </li>

        <li>
            {{ Form::label('views', 'Views:') }}
            {{ Form::checkbox('views') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


