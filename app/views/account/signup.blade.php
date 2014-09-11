@extends('layouts.master')

{{-- Page title --}}
@section('title')
Account Sign up ::
@parent
@stop

@section('css')
	{{ HTML::style('assets/css/sign/signin.css') }}
	{{ HTML::style('assets/css/index.css') }}
@stop

{{-- Page content --}}
@section('main')

<form method="post" action="{{ route('signup') }}" class="form-horizontal form-signin" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<h2 class="form-signin-heading" style="background:#298A08;">Register</h2>
	<div class="login-wrap">

		<!-- First Name -->
		<div class="control-group{{ $errors->first('first_name', ' error') }}">
			<!-- <label class="control-label" for="first_name">First Name</label> -->
			<input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
			<br>{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Last Name -->
		<div class="control-group{{ $errors->first('last_name', ' error') }}">
			<!-- <label class="control-label" for="last_name">Last Name</label> -->
			<input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
			<br>{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Email -->
		<div class="control-group{{ $errors->first('email', ' error') }}">
			<!-- <label class="control-label" for="email">Email</label> -->
			<input type="text" name="email" id="email" class="form-control" value="{{ Input::old('email') }}" placeholder="Email"/>
			<br>{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Password -->
		<div class="control-group{{ $errors->first('password', ' error') }}">
			<!-- <label class="control-label" for="password">Password</label> -->
			<input type="password" name="password" id="password" class="form-control" value="" placeholder="Password"/>
			<br>{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Password Confirm -->
		<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
			<!-- <label class="control-label" for="password_confirm">Confirm Password</label> -->
			<input type="password" name="password_confirm" id="password_confirm" class="form-control" value="" placeholder="Re-Type Password" />
			<br>{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>

		
		<!-- Agree to Terms Of Service -->
		<!-- <div class="control-group{{ $errors->first('terms', ' error') }}">
	        <label class="checkbox" for="terms">
	        	<input type="hidden" name="terms" value="off" />
	        	<input type="checkbox" name="terms" id="terms" {{ Input::old('terms') }} />
	            Tick checkbox if you are a Fundi
	        </label>
			{{ $errors->first('terms', '<span class="help-block">:message</span>') }}
		</div> -->
        
        <button class="btn btn-large btn-success" type="submit">Sign Up</button>

        <div class="registration">
            Already Registered?
            <a class="pull-right" href="{{ route('signin') }}">
                Login
            </a>
        </div>
    </div>
</form>
@stop
