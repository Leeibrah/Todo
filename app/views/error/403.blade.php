@extends('layouts.fundi')

{{-- Web site Title --}}
@section('title')
	@parent
	Access Forbidden
@stop

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
@stop

@section('js')
@stop

@section('main')
	<div class="error-container">
		<h1>403</h1>
		
		<hr>

		<p>
			<!-- You don't have the necessary permissions to access to this page. -->
			This page is not visible to the Public.
		</p>

		<p>
			Perhaps you would like to go to our <a href="{{ URL::route('home') }}">Home Page</a>?
		</p>


	</div>
@stop