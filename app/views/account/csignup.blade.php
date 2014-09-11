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

@section('mai')
	<form accept-charset="UTF-8" action="{{ route('csignup') }}" class="new_contractor_signup_form" id="new_contractor_signup_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="+5j/26HlxGVesG8INwcLuEyveYn/TVe+kIbPbn+YMAE="></div>
  

                        <input id="hdn_type" name="hdn_type" type="hidden" value="contractor">
                        <input id="contractor_signup_form_contractor_id" name="contractor_signup_form[contractor_id]" type="hidden" value="">
                          <input id="contractor_signup_form_claim" name="contractor_signup_form[claim]" type="hidden" value="false">
                          <!-- First Name -->
                          <div class="control-group{{ $errors->first('first_name', ' error') }}">
                            <label class="control-label" for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
                            <span class="input-group-addon icon user"></span>
                            <br>{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
                          </div><br>

                          <!-- Last Name -->
                          <div class="control-group{{ $errors->first('last_name', ' error') }}">
                            <label class="control-label" for="last_name">LastName</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
                            <span class="input-group-addon icon user"></span>
                            <br>{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
                          </div>

                          <div class="form-group">
                            <label for="contractor_signup_form_business_name">Business Name</label>
                            <div class="input-group">
                              <input class="form-control" id="contractor_signup_form_business_name" name="contractor_signup_form[business_name]" placeholder="Utalli Co. Ltd" size="30" type="text">
                              <!-- value: (params[:hdn_name].present? ? params[:hdn_name]: "") -->
                              <span class="input-group-addon icon business"></span>
                            </div>
                          </div>

                        <div class="form-group">
                          <label class="control-label" for="contractor_signup_form_email">Email</label>
                          <div class="input-group">
                              <input class="form-control" id="contractor_signup_form_email" name="contractor_signup_form[email]" placeholder="name@email.com" size="30" type="email">
                            <span class="input-group-addon icon email"></span>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="form-group col-lg-6 col-xs-12">
                            <label for="contractor_signup_form_phone">Phone</label>
                            <div class="input-group">
                                <input class="form-control" id="contractor_signup_form_phone" maxlength="14" name="contractor_signup_form[phone]" placeholder="254 714 019 079" size="14" type="text">
                              <span class="input-group-addon icon phone"></span>
                            </div>
                          </div>
                          
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label for="contractor_signup_form_password">Password</label>
                          <div class="input-group">
                            <input class="form-control" id="contractor_signup_form_password" name="contractor_signup_form[password]" placeholder="password" size="30" type="password">
                            <span class="input-group-addon icon password"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="contractor_signup_form_password">Password</label>
                          <div class="input-group">
                            <input class="form-control" id="contractor_signup_form_password" name="contractor_signup_form[password]" placeholder="password" size="30" type="password">
                            <span class="input-group-addon icon password"></span>
                          </div>
                        </div>
                        <hr>
                          <input class="green button btn" data-disable-with="Processing ..." name="commit" type="submit" value="Sign up">
                      </form>
                </div>
                <!-- end contractor form -->

                <!-- start homeowner_form -->
                <div class="tab-pane part-form " id="homeowner_form">
                  <!-- <strong>We've already helped 50,000 homeowners.</strong> -->
    <form accept-charset="UTF-8" action="{{ route('signup') }}" class="new_homeowner_form" id="new_homeowner_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="+5j/26HlxGVesG8INwcLuEyveYn/TVe+kIbPbn+YMAE="></div>
    
@stop
@section('main')

	<form method="post" action="{{ route('csignup') }}" class="form-horizontal form-signin" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<h2 class="form-signin-heading" style="background:#298A08;">Register</h2>
		<div class="login-wrap">

			<!-- First Name -->
			<div class="control-group{{ $errors->first('first_name', ' error') }}">
				<!-- <label class="control-label" for="first_name">First Name</label> -->
				<input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
			</div><br>

			<!-- Last Name -->
			<div class="control-group{{ $errors->first('last_name', ' error') }}">
				<!-- <label class="control-label" for="last_name">Last Name</label> -->
				<input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
			</div><br>

			<!-- Business Name -->
			<div class="control-group{{ $errors->first('business_name', ' error') }}">
	            <!-- <label for="contractor_signup_form_business_name">Business Name</label> -->
	              <input type="text" name="business_name" id="business_name" class="form-control" value="{{ Input::old('business_name') }}" placeholder="Business Name" size="30" type="text">
	              <!-- value: (params[:hdn_name].present? ? params[:hdn_name]: "") -->
	              {{ $errors->first('business_name', '<span class="help-block">:message</span>') }}
	         </div><br>

	         <!-- Business Name -->
			<div class="control-group{{ $errors->first('phone', ' error') }}">
	            <!-- <label for="contractor_signup_form_business_name">Business Name</label> -->
	              <input type="text" name="phone" id="phone" class="form-control" value="{{ Input::old('phone') }}" placeholder="Phone Number" size="30" type="text">
	              <!-- value: (params[:hdn_name].present? ? params[:hdn_name]: "") -->
	              {{ $errors->first('phone', '<span class="help-block">:message</span>') }}
	         </div><br>

			<!-- Email -->
			<div class="control-group{{ $errors->first('email', ' error') }}">
				<!-- <label class="control-label" for="email">Email</label> -->
				<input type="text" name="email" id="email" class="form-control" value="{{ Input::old('email') }}" placeholder="Email"/>
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div><br>

			<!-- Password -->
			<div class="control-group{{ $errors->first('password', ' error') }}">
				<!-- <label class="control-label" for="password">Password</label> -->
				<input type="password" name="password" id="password" class="form-control" value="" placeholder="Password"/>
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			</div><br>

			<!-- Password Confirm -->
			<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
				<!-- <label class="control-label" for="password_confirm">Confirm Password</label> -->
				<input type="password" name="password_confirm" id="password_confirm" class="form-control" value="" placeholder="Re-Type Password" />
				{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
			</div><br>

			
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
