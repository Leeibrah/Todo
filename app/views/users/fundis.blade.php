@extends('layouts.fundi')

@section('css')
	  {{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
	  {{ HTML::style('/assets/css/search.css') }}
@stop


@section('main')

	
<!-- 
	<div id="searchpage">

		<form method="get" class="form-inline tool" role="form" >
		  
		  <input type="hidden" name="city" value="">
		    <div class="fields">
		      <div class="row">
		      
		      <div class="form-group" id="keyword_city">
		        <label class="sr-only" for="txt_keyword">Keyword</label>
		        <input type="text" class="form-control" id="txt_keyword" name="keywords" value="">
		        <i class="fieldicon glyphicon glyphicon-search" style="margin-top:-35px;"></i>
		      </div>
		      <div class="form-group" id="city" style="margin-top:-12px;">
		        <label for="ddn_city" class="sr-only">City</label>
		        <select id="ddn_city" class="form-control">
		            <option value="beaux-arts-wa">Nairobi</option>
		           
					<option value="bellevue-wa" selected>Nairobi</option>
					<option value="#" selected>Nairobi</option>
		            <option value="bothell-wa">Nyeri</option>
		            <option value="brier-wa">Nanyuki</option>
		            <option value="burien-wa">Nakuru</option>
		            <option value="issaquah-wa">Mombasa</option>
		            <option value="kenmore-wa">Kisii</option>
		            <option value="kirkland-wa">Nyahururu</option>
		            
		        </select>
		      </div>


		        <div class="form-group" style="margin-top: -12px;">
		          <button type="submit" class="btn btn-primary" id="btn_search"><i class="fa fa-search" style="margin-top:2px;"></i> Search</button>
		          <button type="button" class="btn btn-default" id="btn_refine" data-toggle="button">Refine Results</button>
		        </div>
		        <div class="form-group" id="type_toggle">
		          
		        </div>
		    </div>
		    </div>
		</form> 

	</div> -->

	<div class="custom-container">
	   <h1 class="text-center">Top Fundis in Kenya</h1>
	    
	      
	  <div class="container">
	    <div id="breadcrumbs" class="row">
	      <div class="col-md-7">
	        Mafundi
	        <span class="arr">&rsaquo;</span> 
	        Find Technicians
	       
	      </div>

	      <div class="col-md-5">
	        <div class="pull-right">
	          <div class="fb-share-button" data-href="http://developers.facebook.com/docs/plugins/" data-width="120" data-type="button"></div>
	        </div>
	        <div class="pull-right">&nbsp;&nbsp;&nbsp;</div>
	        <div class="pull-right">
	          <div class="g-plusone" data-size="medium" data-annotation="none" data-width="120"></div>
	        </div>
	      </div>

	    </div>
	  </div>

	  <div class="row">
      <div class="col-md-7">
                          
       @if ($fundis->count())
       @foreach ($fundis as $fundi)

        <div class="item sponsored border-boxed" data-technician_id="30373089">
          
           

          <div class="row new-row">
            <div class="col-md-9">
              <div class="row">

                <div class="col-md-12">
                  <h4>
                    <a href="/users/{{ $fundi->id }}">{{{ $fundi->first_name }}} {{{ $fundi->last_name }}}</a>
                  </h4>
                 <!-- <div class="buildzoomscorelabel neue">
                    <span title="This is your BuildZoom score" class="buildzoomgrade">106</span>
                  </div>-->
                  <div>
	                    <span class="location"><i class="glyphicon glyphicon-map-marker"></i>{{{ $fundi->location }}}</span>

	                    <div class="clearfix"></div>
	                    <div class="mini services-offered">
	                      <!-- <span class="label label-primary"></span>                      
	                      <span class="label label-primary">DSTV Cable installation</span>                      
	                      <span class="label label-primary">Laptop Repair</span>   -->                                                               
	                 	  <span class="label label-primary">{{{ $fundi -> services }}}</span>

	                    </div>

	                    <div class="clearfix"></div>
	                    <div class="mini about">
	                      <div class="img-circle">
	                        <i class="glyphicon glyphicon-user"></i>
	                      </div>
	                      <blockquote>
	                       <span class="partial">
	                         
	                       All about {{ $fundi->first_name }}...
	                       </span><span class="more"><a href="/users/{{ $fundi->id }}">more</a></span>
	                        <span class="hide full-content">                                                  
							 {{{ $fundi->description }}}
							</span>
	                      </blockquote>
	                    </div>  
                  </div>
                  <small class="hide"><i class="glyphicon glyphicon-phone-alt"></i>{{{ $fundi->telephone }}}</small>

                </div>
              </div>
              <div class="row addtl-info">
	              <div class="clearfix"></div>
	              <!-- <div class="mini">
	                <div class="col-md-12">
	                  <div class="">Basic charges: <strong>6,000 KES</strong></div>
	                  <div class="">Accept Deposit: <strong>Yes</strong></div>
	                </div>
	              </div> -->
              </div>

            </div>
            <div class="col-md-3" style="float:left;">
              <div class="image">
                  <a href="#">
                  	<img src="{{ All::getUpload($fundi, 'image') }}?w=113&amp;h=113&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" width="123" height="123" style="display:block;">
                  	<!-- <img src="{{ All::getUpload($fundi, 'image') }}" /> -->
                  </a>
                  <!-- <div style="margin-left:-2px;margin-right:-3px;">
                    <div class="border-boxed pull-left" style="padding: 3px 2px 0; width: 33.3333%;">
                      <a href="#"><img src="../images/icons/6.png?w=38&amp;h=38&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" width="38" height="38" class="pull-left"></a>
                    </div>
                  </div>
                  <div style="margin-left:-2px;margin-right:-3px;">
                    <div class="border-boxed pull-left" style="padding: 3px 2px 0; width: 33.3333%;">
                      <a href="#"><img src="https://www.filepicker.io/api/file/LSwOTcjnTIuXapyltFVt/convert?w=38&amp;h=38&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" width="38" height="38" class="pull-left"></a>
                    </div>
                  </div>
                  <div style="margin-left:-2px;margin-right:-3px;">
                    <div class="border-boxed pull-left" style="padding: 3px 2px 0; width: 33.3333%;">
                      <a href="#"><img src="../images/icons/7.png?w=38&amp;h=38&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" width="38" height="38" class="pull-left"></a>
                    </div>
                  </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="inbetween"></div>
        <div class="inbetween"></div>


        @endforeach
   

        
    	<nav class="pagination">        	

		</nav>


			      </div>

			      <div class="col-md-5">
			        <div class="row">
			          <div class="col-md-12">
			              <div id="quick-request-2">
			     

			  </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            
  <div id="suggest">

           <div class="suggest searches">
               <div class="title">Similar Searches</div>
                    <ul>
                        <li><span class="glyphicon glyphicon-search"></span><a href="#">Electronics Repair</a></li>
                    </ul>
                </div>

				        <div class="suggest cities">
				            <div class="title">Nearby Areas</div>
				            <ul>
				                <li><a href="/searchloc/All/All"><span class="glyphicon glyphicon-map-marker"></span> Langata</a></li>
				                
				            </ul>
				        </div>

				  </div>

				          </div>
				        </div>
      <!--   <div class="row">
          <div class="col-md-12">
            <div id="answers-for-results" class="">
				  <div class="ask area">
				    <strong class="h3">Ask a Question</strong>
				    <form accept-charset="UTF-8" action="#" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="LNllOBWQdmRYHtv5GLLx2fWS0N7PCm8fR7WapuPlvus="></div>
				      <div class="form-group">
				        <input class="form-control" id="title" name="title" placeholder="How much should dstv installation cost?" type="text" value="">
				      </div>
				      <input class="btn btn-default" name="commit" type="submit">
					</form> 
				 </div>
				  <div class="bottom black">
				    <a href="../answers.buildzoom.com/index.html">View more on Mafundi Answers</a>
				  </div>
				</div>
				<div class="clearer"></div>

          </div>
        </div> -->
      </div>
    </div>

	</div>
@else
	There are no fundis
@endif

@stop
