@extends('layouts.fundi')

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
		{{ HTML::style('/assets/css/dashboard.css') }}
@stop

@section('js')
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		{{ HTML::script('/bootstrap3/js/bootstrap.min.js') }}
@stop

@section('main')

<!-- <h1>Show User</h1> -->
<div class="mainsection" style="margin-left:-20px;">
	        
		@include('partials.sidebar')

		    

	   <div id="dashboard_panels" style="float:left; width:750px;">
		  <div class="row">
		    <div class="h2 light-tone col-md-12 text-center">{{{ All::getName($user) }}} Profile</div>
		  </div>

		  <div class="clearfix">&nbsp;</div> 





			<!-- <table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Email</th>
				
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>{{{ $user->firstname }}}</td>
						<td>{{{ $user->lastname }}}</td>
						<td>{{{ $user->email }}}</td>
				
			            <td>{{-- link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
			            <td>
			                {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
			                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
			                {{ Form::close() --}}
			            </td>
					</tr>
				</tbody>
			</table> -->

			<section class="four columns">
		        <!-- <h6>About {{{ $user->last_name }}}</h6> -->
		        <p></p>
		        <div style="margin:2px 0 0 10px; height:200px; width:400px;">
			        <section class="" style="float:left;">
				        <h6>First Name :</h6>			      			        
				        <h6>Last Name :</h6>
				        <h6>Email :</h6>			      			        
				        <h6>Phone Number :</h6>
				        <h6>Location : </h6>
				    </section>
				    <section class="pull-right" style="margin:2px 0 0 10px;">		
				    	<h6>{{{ $user->first_name }}}</h6>	  
				    	<h6>{{{ $user->last_name }}}</h6>
				    	<h6>{{{ $user->email }}}</h6>	  
				    	<h6>{{{ $user->phone }}}</h6>	
				    	<h6>{{{ $user->location }}}</h6> 
				        
				        
				    </section>
			    </div>
		    </section>
		</div>

		</div>
@stop