@extends('layouts.fundi')

{{-- Web site Title --}}
@section('title')
	@parent
	Page Not Found
@stop

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
@stop

@section('js')
@stop

@section('main')
	
	<div class="error-container">
        <h1>404</h1>

		<hr>

		<p>
			This page is missing on our servers.
		</p>

		<p>
			Perhaps you would like to <a href="{{ URL::to('contactus'); }}">report this</a>?
		</p>
        
        <div id="www">:(</div>
        
	</div>

@stop