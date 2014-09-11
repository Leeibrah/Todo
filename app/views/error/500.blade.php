@extends('layouts.fundi')

{{-- Web site Title --}}
@section('title')
	@parent
	Internal Server Error
@stop

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
@stop

@section('js')
@stop

@section('main')
	
	<div class="error-container">
	    <h1>500</h1>

		<?php $messages = array('Yainks!', 'Oh no!', 'Whoops!'); ?>

		<h1><?php echo $messages[mt_rand(0, 2)]; ?></h1>

		<hr>

		<p>
			An error just happened on our servers.
		</p>

		<p>
			Perhaps you would like to <a href="{{ URL::to('contactus'); }}">report this</a>?
		</p>

	    <div id="www">:(</div>
		
	</div>
@stop
