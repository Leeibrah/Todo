@extends('layouts.fundi')

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('assets/css/index.css') }}
		{{ HTML::style('assets/css/dashboard.css') }}
@stop

@section('js')	
		{{ HTML::script('/bootstrap3/js/jquery.min.js') }}
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> -->
		<!-- {{ HTML::script('/jqueryui/js/jquery-1.9.1.js') }} -->
		{{ HTML::script('/bootstrap3/js/bootstrap.min.js') }}
@stop

<?php 
	$userid = Sentry::getUser()->id;
	$useremail = Sentry::getUser()->email;
	$images_count  = DB::table('galleries')->where('user_id', '=', $userid)->count(); 
	$endorsements_count  = DB::table('endorsements')->where('user_id', '=', $userid)->count();
	$reviews_count  = DB::table('reviews')->where('user_id', '=', $userid)->count();
	$leads_count  = DB::table('leads')->where('user_id', '=', $userid)->count();
	$service_requests_count = DB::table('service_requests')->where('email', '=', $useremail)->count();
	$credentials_count  = DB::table('credentials')->where('user_id', '=', $userid)->count();

?>

 @include('partials.header')
 
@section('main')

		<div class="mainsection">
	        
			@include('partials.sidebar')

			    

		   <div id="dashboard_panels" style="float:left;">
			  <div class="row">
			    <div class="h2 light-tone col-md-12 text-center">Welcome to Mafundis</div>
			  </div>

			  <div class="clearfix">&nbsp;</div> 
			  
			  @if(Sentry::getUser()->hasAccess('user'))
	          <section class="wrapper">
	              <!--state overview start-->
	              <div class="row state-overview">
	                  <div class="col-sm-6">
	                      <section class="panel">
	                          <div class="symbol terques _height">
	                              <!-- <i class="fa fa-user"></i> -->
	                          </div>
	                          <div class="value">
	                              <h1 class="count">
	                                  {{ $images_count }}                              
	                              </h1>
	                              <p>Images</p>

	                          </div>
	                          {{ link_to_route('user.galleries.create', 'Add Work Images to your Profile.') }}
	                      </section>
	                  </div>
	                  
	                  <div class="col-sm-6">
	                      <section class="panel">
	                          <div class="symbol blue _height">
	                              <!-- <i class="fa fa-volume-up"></i> -->
	                          </div>
	                          <div class="value">
	                              <h1 class=" count4">
	                                  {{ $credentials_count }}
	                              </h1>
	                              <p>Creditials</p>
	                          </div>
	                          {{ link_to_route('user.credentials.create', 'Add Work Certificates Details.') }}
	                      </section>
	                  </div>

	                  <div class="col-sm-6">
	                      <section class="panel">
	                          <div class="symbol red _height">
	                              <!-- <i class="fa fa-barcode"></i> -->
	                          </div>
	                          <div class="value">
	                              <h1 class=" count2">
	                                  {{ $endorsements_count }}                         
	                              </h1>
	                              <p>Endorsements</p><br>
	                          </div>
	                      </section>
	                  </div>
	                  <div class="col-sm-6">
	                      <section class="panel">
	                          <div class="symbol yellow _height">
	                              <!-- <i class="fa fa-video-camera"></i> -->
	                          </div>
	                          <div class="value">
	                              <h1 class=" count3">
	                                  {{ $reviews_count }}
	                              </h1>
	                              <p>Reviews</p><br>
	                          </div>
	                      </section>
	                  </div>
	                  
	                 
	              </div>
	              <!--state overview end-->	            

	          </section>
	          @else
	          	<h6>Start Interracting with Fundis right away.</h6>

	          		<div class="row state-overview">
	                  <div class="col-sm-6">
	                      <section class="panel">
	                          <div class="symbol terques _height">
	                              <!-- <i class="fa fa-user"></i> -->
	                          </div>
	                          <div class="value">
	                              <h1 class="count">
	                                  {{ $service_requests_count }}                              
	                              </h1>
	                              <p>Service Requests</p>
           	                      <a href="{{ URL::to('user/service_requests/create') }}"><span>Request for a Service and get a Fundi right away.</span></a>
	                          </div>

	                      </section>
	                  </div>
	                </div>
	          @endif

			</div> <!-- Dashboard panels -->

		</div>
	        

@stop