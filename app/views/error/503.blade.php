@extends('layouts.fundi')

{{-- Web site Title --}}
@section('title')
	@parent
	Scheduled Maintenance
@stop

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
@stop

@section('js')
@stop

@section('main')

	<div class="error-container">

	    <h1>503</h1>

	    <hr/>

		<p>
			We are under a scheduled maintenance and we'll be back shortly!
		</p>

	    <div id="www">:(</div>

	</div>
@stop