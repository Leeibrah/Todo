@extends('layouts.fundi')

{{-- Page title --}}
@section('title')
Forgot Password ::
@parent
@stop

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
		{{ HTML::style('/assets/css/show.css') }}
@stop

@section('js')
		{{ HTML::script('/bootstrap/3.0.2/js/bootstrap.min.js') }}
		{{ HTML::script('/assets/jquery/1.7.2/jquery.min.js') }}
		<script src="/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  		<script src="/bootstrap/3.0.2/js/bootstrap.min.js" type="text/javascript"></script>
@stop

{{-- Page content --}}
@section('main')
<div class="page-header">
	<h3>Forgot Password</h3>
</div>

<form method="post" action="" class="form-horizontal">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Email -->
	<div>Enter Your Email Address</div>
	<div class="control-group{{ $errors->first('email', ' error') }}">
		
		<input type="text" class="form-control" name="email" id="email" value="{{ Input::old('email') }}" />
		{{ $errors->first('email', '<span class="help-block">:message</span>') }}
	</div>

	<!-- Form actions -->
	<div class="control-group">
		<a class="btn btn-warning" href="{{ route('home') }}">Cancel</a>
		<button type="submit" class="btn btn-info" >Submit</button>
	</div>
</form>

	@if(Session::has('success'))
	    <div class="success">
	        <h5>{{ Session::get('success') }}</h5>
	    </div>
	@endif

@stop
