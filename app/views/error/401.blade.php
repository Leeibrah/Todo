@extends('layouts.fundi')

{{-- Web site Title --}}
@section('title')
	@parent
	Not Logged In
@stop

@section('css')
        {{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
        {{ HTML::style('/assets/css/index.css') }}
@stop

@section('js')
@stop

@section('main')
	
	<div class="error-container">

        <h1>401</h1>
    
    	<hr/>

        <p>You have to be logged in to access this page.</p>
    
        <p>Please <a href="{{ URL::route('signin') }}" class="_get-sign-in _aqua">log in</a> or 
        	<a href="{{ URL::route('signup') }}" class="_get-sign-up _aqua">register.</a></p>
        
    </div>

@stop