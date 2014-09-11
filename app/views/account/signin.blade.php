@extends('layouts.master')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop



{{-- Page content --}}
@section('main')
<div class="body">
<form method="post" action="{{ route('signin') }}" class="form-horizontal form-signin">
  <!-- CSRF Token -->
  <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}" />
  
  <h2 class="form-signin-heading" style="background:#298A08;">Sign in into your account</h2>
  <div class="login-wrap">
    <!-- Email -->
    <div class="control-group{{ $errors->first('email', ' error') }}">
      <input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email') }}" placeholder="john.doe@email.com"/>
      {{ $errors->first('email', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Password -->
    <div class="control-group{{ $errors->first('password', ' error') }}">
      <input class="form-control" type="password" name="password" id="password" value="" placeholder="Password"/>
      {{ $errors->first('password', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Remember me -->
    <div class="control-group">
      

      <!-- <a href="" class="btn btn-link">Forgot Password</a> -->
    </div>

    <!-- Form actions -->
    <div class="control-group">
      <button type="submit" class="btn btn-lg btn-login btn-block">Sign in</button>
    </div>
      <div class="registration">
          Don't have an account yet?
          <a class="" href="{{ route('signup') }}"><br>
              Create an account
          </a>
      </div>
    </div>
</form>
</div>
@stop
