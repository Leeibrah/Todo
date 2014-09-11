@extends('layouts.fundi')

@section('css')
		{{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
		{{ HTML::style('/assets/css/index.css') }}
		{{ HTML::style('/assets/css/show.css') }}	
		<!-- bxSlider CSS file -->
		<link href="/bxslider/jquery.bxslider.css" rel="stylesheet" />

@stop

 
@section('js')
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<!-- {{ HTML::script('/jqueryui/js/jquery-1.9.1.js') }} -->
 		{{ HTML::script('/bootstrap3/js/bootstrap.min.js') }}
 		{{ HTML::script('/assets/js/show.js') }}
@stop

@section('main')
	
	<!-- <script type="text/javascript" src="localhost:8000/bootstrap/3.0.2/js/bootstrap.min.js"></script> -->
	<body class="contractors show" itemscope="" itemtype="http://schema.org/LocalBusiness" data-twttr-rendered="true">
	  <div id="fb-root" class="FB_UI_Hidden"></div>
	    
		@include('partials.header')

		  <div class="clearfix"></div>
		  <section class="browse floater posd" style="display:none;" data-state="Default">
		  <div class="container">
		    <div id="browse" class="drop-tab">
		 
		        


		      <div class="drop-tab" id="gallery" style="display:none">
		        <div class="container">
		          <div class="row">
		          

		            <div class="col-sm-3">
		              <div class="thumb">
		                <a href="blue-sound-construction-inc.html" class="img-wrap"><img width="205" height="205" src="http://d3uyjocb29uv4r.cloudfront.net/api/file/sJHfMnGCTNetTGwyRTw5/convert?w=205&amp;h=205&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" alt=""></a>
		                <div class="cinfo">
		                  <div class="clogo"><img width="42" height="42" src="http://d3uyjocb29uv4r.cloudfront.net/api/file/mpHEipfoQKeADpWngBjF/convert?w=42&amp;h=42&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" alt="" class="imgcircle"></div>
		                  <div class="info-wrap">
		                    <strong><a href="blue-sound-construction-inc.html">Projects by Blue Sound Construction, Inc.</a></strong>
		                    <p><a href="blue-sound-construction-inc.html">Blue Sound Construction, Inc.</a></p>
		                    <br class="clear">
		                </div>
		                <br class="clear">
		              </div>
		            </div>
		          </div>
		          <div class="col-sm-3">
		            <div class="thumb">
		              <a href="greg-bain-and-company" class="img-wrap"><img width="205" height="205" src="http://d3uyjocb29uv4r.cloudfront.net/api/file/ls7lCY3QTA6FITHugJcA/convert?w=205&amp;h=205&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" alt=""></a>
		              <div class="cinfo">
		                <div class="clogo"><img width="42" height="42" src="http://d3uyjocb29uv4r.cloudfront.net/api/file/ls7lCY3QTA6FITHugJcA/convert?w=42&amp;h=42&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" alt="" class="imgcircle"></div>
		                <div class="info-wrap">
		                  <strong><a href="greg-bain-and-company">Remodeling Projects by Greg Bain &amp; Company</a></strong>
		                  <p><a href="greg-bain-and-company">Greg Bain &amp; Company</a></p>
		                  <br class="clear">
		                </div>
		                <br class="clear">
		              </div>
		            </div>
		          </div>

		          <div class="intro col-sm-3">
		            <h3>Project Galleries</h3>
		            <p>Check out our galleries and see amazing projects completed by BuildZoom contractors.</p>
		            <a href="../find/images.html" class="more inline">View more workgalleries. <span class="more arrow"></span></a>
		          </div>
		        </div>
		      </div>
		    </div>

		        

		    <div id="answers" class="drop-tab" style="display:none">
		      <div class="row">
		        <div class="col-sm-3">
		          <div class="question">
		            <div class="title">Most Viewed</div>
		            <strong><a href="../../answers.buildzoom.com/1036/how-should-i-approach-my-garage-remodeling-projectd41d.html?">How should I approach my garage remodeling project? </a></strong>
		            <p>answered <em>7 Months ago</em> in <a class="inline" href="../../answers.buildzoom.com/interiors.html">Interiors</a> by <em>Anonymous</em> (120 points)</p>
		            <div class="qstats">
		              <div class="votes"><strong>0</strong>votes</div>
		              <div class="answers"><strong>13</strong>answers</div>
		              <div class="views"><strong>733</strong>views</div>
		            </div>
		          </div>
		        </div>

		        <div class="col-sm-3">
		          <div class="question">
		            <div class="title">Most Answered</div>
		            <strong><a href="../../answers.buildzoom.com/15/how-can-i-repair-damage-to-my-hardwood-floord41d.html?">How can I repair damage to my hardwood floor?</a></strong>
		            <p>answered <em>7 Months ago</em> in <a class="inline" href="../../answers.buildzoom.com/flooring/hardwood-floors.html">Hardwood Floors</a> by <em>Anonymous</em> </p>
		            <div class="qstats">
		              <div class="votes"><strong>2</strong>votes</div>
		              <div class="answers"><strong>296</strong>answers</div>
		              <div class="views"><strong>389</strong>views</div>
		            </div>
		          </div>
		        </div>

		        <div class="col-sm-3">
		          <div class="question">
		            <div class="title">Most Commented</div>
		            <strong><a href="../../answers.buildzoom.com/870/can-this-banister-be-repairedd41d.html?">Can this banister be repaired? </a></strong>
		            <p>answered <em>9 Months ago</em> in <a class="inline" href="../../answers.buildzoom.com/home-repair.html">
		Home Repair</a> by <em>Anonymous</em> </p>
		            <div class="qstats">
		              <div class="votes"><strong>3</strong>votes</div>
		              <div class="answers"><strong>4</strong>answers</div>
		              <div class="views"><strong>52</strong>views</div>
		            </div>
		          </div>
		        </div>
		           
		        <div class="intro col-sm-3">
		          <h3>BuildZoom Answers</h3>
		          <p>Get answers and find solutions straight from the experts . You can also share and receive tips from other members of the community.</p>
		          <a href="../../answers.buildzoom.com/index.html" class="more inline">View more questions and answers. <span class="more arrow"></span></a>
		          
		        </div>
		      </div>
		    </div>


		      </div>
		    </div>
		  </div>
		</section>

		<div class="clearfix" style="height: 52px;"></div>

			<div id="featured" class="profile" style="margin-top:-57%;">
			     <!-- || @contractor.best_image_cloudfront_slug.present?  -->
			    <div class="showcase image">
			        <img alt="Elegant Hardwood Floor LLC header image" height="430px" src="http://d3uyjocb29uv4r.cloudfront.net/api/file/qIOPo7ASNan20HCnPN3e/convert?w=1440&amp;h=430&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" width="1440px" />
			    </div>
			  <div class="inner-profile container background">
			    <div class="row clearfix">
			      <div class="col-xs-8">
			        <h1 class="clearfix" itemprop="">
			        	{{{ All::getName($user) }}}
			        </h1>
			      </div>
			      <div class="col-xs-4">
			          <div id="profile-overlay">
			            <div id="top-overlay">
			            @if(Sentry::check())
			              <a href="#" class="btn green button" data-target="#messageContractorModal" data-toggle="modal">Message this Fundi</a>
			            @else
			              <a href="/auth/signin" class="btn green button">Sign In to Contact this Fundi</a>
			            @endif
			                <a href="#review" class="btn button d-blue">Write Review</a>
			            </div>

			              <!-- <a href="../seattle-wa.html" style="color:white;  ">
			                <div id="bottom-overlay" class="text-center"><span class="sign i"></span>Find similar contractors in <div>Nairobi</div></div>
						  </a>     -->    
					  </div>
			      </div>
			    </div>
			  </div>
			</div>

			<section id="main" class="profile clearfix">
			  <div id="navbar" class="pagenavbar clearfix">
			    <div class="container">
			      <div class="pagenav clearfix">
			        <div class="row clearfix">
			          
			         
			          <div class="col-xs-4">
			            <div class="social sharing">
			              <span class="hide-overflow">
			                <div class="fb-like" data-href="http://www.buildzoom.com" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
			              </span>
			              <span class="hide-overflow" style="width: 41px; padding-left: 5px;">
			                <div id="___plusone_0" style="position: absolute; width: 450px; left: -10000px;">
			                  <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I0_1398063201730" name="I0_1398063201730" src="#" data-gapiattached="true"></iframe></div><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="36" data-gapiscan="true" data-onload="true" data-gapistub="true"></div>
			              </span>
			              <span class="hide-overflow">
			                <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="" class="twitter-share-button twitter-tweet-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 105px; height: 20px;"></iframe>
			              </span>
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="container">
			    <div class="row">
			      <div class="container">
			  <div id="breadcrumbs" class="row">
			    <a href="/">Mafundis</a>
			    <span class="arr">›</span>
			    <a href="#">Fundi</a>
			      <!-- <span class="arr">›</span> -->
			      <!-- <a href="#">Nairobi</a> -->
			    <span class="arr">›</span>
			   	{{{ All::getName($user) }}}
			  </div>
			</div>

	      <div class="col-xs-8">
	        <a class="anchor" id="credential"></a>
	        <div class="widget clearfix" id="about">
	          <strong class="title">About the Technician</strong>
	          <div class="wrapper">
	            <div class="description">
	              <p>
	                  
	                  </p><p>{{{ $user->about }}}</p>
	              <p></p>
	              <div id="contactinfo">
	                <h4>Contact Info</h4>
		                <div class="info address clearfix" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
		                  <h5><b>Address: </b></h5>
		                  <span>{{{ $user->address }}}</span>
		                </div>
		                <!-- <div class="info link">
		                    <h5><b>Email: </b></h5><a href="#" itemprop="url" rel="nofollow" target="_blank">{{{ $user->email }}}</a>
		                </div>
		                <div class="info link">
		                    <h5><b>Phone Number: </b></h5><a href="#" itemprop="url" rel="nofollow" target="_blank">{{{ $user->phone }}}</a>
		                </div> -->
	              </div>
	            </div>

	            <!-- Change this to show only on Fundis  {{--{{{ $user->services }}}--}}$json as $key => $value--> 
	              <div>
	                <div class="mini services-offered services clearfix">
	                  <h4>Services</h4>
		                      <span class="badge bg-important"></span>
		                      <!-- <span class="label label-primary"> -->
			                      <a href="#">{{{ All::split($user->services) }}}</a>
			                  <!-- </span> -->
	                    
	                    
	                </div>
	              </div>
	            <div id="edit_profile_btn" style="margin-top: 15px;">
	            </div>
	          </div>
	        </div>

	          <a class="anchor" id="project"></a>

	       <div class="widget dark" id="projects">
            <div class="title">Work Examples
            	<span style="float:right; font-size: 12px;">
            	<!-- <a href="../find/images.html" style="color: white;">See All Images</a> -->
            </span></div>
            <div class="slide carousel" id="projectphotos" data-interval="false">
              
                <ul class="bxslider" style="height:auto;">
					  <!-- <li><img src="/images/works/img1.jpg" /></li> -->
					  <!-- <li><img src="/images/works/img2.jpg" /></li> -->
					  <!-- <li><img src="/images/works/img3.jpg" /></li> -->

					 @if($galleries->count())
                    	@foreach ($galleries as $gallery)
		                    <div class="img-wrap">
		                      <a href="#" data-gallery-name="" data-gallery="">
		                        <!-- <img alt="" src="/uploads/gallery/image/{{{ $gallery->image }}}?w=145&amp;h=200&amp;fit=crop&amp;quality=50&amp;cache=true&amp;compress=true" style="width: 100%; height: 100%;" /> -->
		                        <li>
			                        <img alt="" src="/uploads/galleries/image/{{{ $gallery->image }}}" />
			                    </li>
		                      </a>    
		                    </div>
		                   
		                    @endforeach
		                @else
		                	<div class="" style="height:auto; margin-top:-6px;">
		                      Fundi has not publish any work Images.
		                	</div>
	                    	
						@endif
				</ul>

            </div>
          </div>
	            

	        <a class="anchor" id="review"></a>
	        <div class="widget clearfix" id="reviews">
	          <strong class="title">Reviews</strong>

	          <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="pull-center text-center">
	            <span itemprop="ratingValue" content="0"></span>
	            <span itemprop="reviewCount" content="0"></span>
	          </div>

	          @if($reviews->count())
		          @foreach ($reviews as $review)
		          <div class="review clearfix" id="review_7909087" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
		              <div class="userinfo col-xs-2 text-center">
		                  <img alt="default reviewer logo" class="img-circle" src="/uploads/users/image/{{{ All::getImageFromEmail($review->from) }}}">
		                <span>
		                  <strong itemprop="author">{{{ All::getNameFromEmail($review->from) }}}</strong>
		                </span>
		              </div>
		              <div class="userreview col-xs-10">
		                <div class="space1 clearfix">
		                  <div itemprop="datePublished" style="float:left;">{{{ All::convertDate($review->created_at) }}}</div>
		                  <div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
		                    <meta itemprop="worstRating" content="1">
		                    <div class="rating-static" itemprop="ratingValue" value="5" content="5" id="rating_7909087" title="Highly Recommended" style="width: 120px;">
		                    	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="1" title="Terrible">&nbsp;
		                    	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="2" title="Poor">&nbsp;
		                    	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="3" title="Good">&nbsp;
		                    	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="4" title="Very Good">&nbsp;
		                    	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="5" title="Highly Recommended">
		                    	<input type="hidden" name="score" value="5" readonly="readonly">
		                    </div>
		                    <meta itemprop="bestRating" content="5">

		                  </div>
		                </div>
		                <div class="comment">
		                  <span class="pointer"></span>
		                    <p>{{{ $review->subject }}}</p>
		                </div>
		              </div>
				  </div>
				  @endforeach
			  @else
				<!-- No review -->
			  @endif

	          <div id="addreview">
	            <div class="userinfo text-center">
	                <img alt="default reviewer image" class="img-circle" src="{{{ All::getUpload($user, 'image') }}}">
	            </div>
	          <div class="instructions">
	              <a class="anchor" id="leave_review"></a>
	              <span>Leave a Review for
	                <h4>{{{ All::getName($user) }}}</h4>
	              </span>
		            <!-- <form accept-charset="UTF-8" action="/sendreview" class="new_review" data-remote="true" id="new_review" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="Ahieawb1ono4QAickkDqP/n5iHm2RqwdeYKYcFnvkuk="></div> -->
		            <form action="/sendreview" method="POST" class="form-horizontal" role="form">
		                <div class="space1" id="review_flash" style="color:red;"></div>
		                <input id="to" name="to" type="hidden" value="{{{ $user->email }}}">
		                <!-- <input id="review_nid" name="review[nid]" type="hidden" value="66699469"> -->
		                <ol>

		                <!-- <li>
		                    <span class="number">1</span>		                  
		                    <div class="col-xs-10">
					              <p>Rate this contractor.</p>
					              <div class="list-stars">
					                <div class="rating-dynamic new" data-value="0" data-id="" style="cursor: pointer; width: 100px;">
					                	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-on.png" alt="1" title="Poor">&nbsp;
					                	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-off.png" alt="2" title="Average">&nbsp;
					                	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-off.png" alt="3" title="Good">&nbsp;
					                	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-off.png" alt="4" title="Very Good">&nbsp;
					                	<img src="//d3flf7kkefqaeh.cloudfront.net/_assets/raty/star-off.png" alt="5" title="Highly Recommended">
					                	<input type="hidden" name="score" value="5"></div>
					              </div>
					              <span id="hint">Terrible</span>
					        </div>				           
		                  </li> -->

		                  <li>
		                    <span class="number">1</span>
		                    <p>Provide a detailed review of this Fundi</p>
		                    <textarea class="form-control" name="subject" placeholder="{{{ All::getName($user) }}} executed this task ..." rows="20">
		                    </textarea>
		                  </li>
		                </ol>
		                <div class="form-group signedin">
		                    <div class="col-lg-12">
		                        <button type="submit" class="btn btn-send green">Submit Review</button>
		                    </div>
		                </div>

		                <!-- <input class="btn green" data-disable-with="Submitting..." name="commit" type="submit" value="Submit your review"> -->
					</form>       

					@if(Session::has('info'))
					    <div class="info">
					        <h5>{{ Session::get('info') }}</h5>
					    </div>
					@endif   
				</div>
	          </div>
	        </div>

	        


		<div class="col-xs-4">



	                 <!-- <script async="" src="../../pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	                  <!-- Landing page ad 
	                  <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-1387738006578564" data-ad-slot="8212368047"></ins>
	                  <script>
	                  (adsbygoogle = window.adsbygoogle || []).push({});
	                  </script> -->
	              </div>
	            </div>
	          </div>
	        </div></section>

	          <div id="messageContractorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog clearfix">
				    <div class="modal-content clearfix">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h3 class="modal-title text-center oswald">Contact {{{ All::getName($user) }}}</h3>
				      </div>
				      <div class="modal-body clearfix space1">
				        <div class="flash"></div>
					        <!-- <form accept-charset="UTF-8" action="http://www.buildzoom.com/messages" class="new_message" data-remote="true" id="new_message"     method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="heruGmeyAGg0VQjLmFoZngrWXSKIxQvBdhsPkyQCNtU=" /></div>
					          <input id="test" name="test" type="hidden" value="start" />
					          <input id="message_i_nid" name="message[i_nid]" type="hidden" value="30373089" />
					          <label for="message_s_sender_name">Your Name</label>
					          <input class="form-control space1" id="message_s_sender_name" name="message[s_sender_name]" size="30" type="text" />

					          <label for="message_s_sender_email">Your Email</label>

					            <input class="form-control space1" id="message_s_sender_email" name="message[s_sender_email]" size="30" type="text" />

					          <label for="message_s_sender_phone">Your Phone</label>
					          <input class="form-control space1" id="message_s_sender_phone" name="message[s_sender_phone]" size="30" type="text" />

					          <label for="message_s_subject">Your Message Subject</label>
					          <input class="form-control space1" id="message_s_subject" name="message[s_subject]" size="30" type="text" value="I would like to discuss a possible project." />
					          <label for="message_s_message">Your Message</label>
					          <textarea class="form-control space1" cols="40" id="message_s_message" name="message[s_message]" rows="5">
					        I was searching on Mafundi and found your business.  I&#x27;m interested in speaking with you about a service.  When are you available to chat more?</textarea>
					                  <input class="btn btn-success btn-block" data-disable-with="Sending..." name="commit" type="submit" value="Send Message" />
					        </form>  -->
			          <form action="/inquire" method="POST" class="contactUs form-horizontal" role="form">

		                <!-- CSRF Token -->
		                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
		                <input type="hidden" name="to" class="to" value="" />

						<!-- <div class="form-group">
		                    <label  class="col-lg-3 control-label">* Your Name:</label>
		                    <div class="col-lg-9">
		                        <input type="text" name="name" class="form-control" placeholder="Your Name">
		                    </div>
		                </div>
		                
		                <div class="form-group">
		                    <label  class="col-lg-3 control-label">* Your Email:</label>
		                    <div class="col-lg-9">
		                        <input type="text" name="email" class="form-control" placeholder="your@email.com">
		                    </div>
		                </div>      -->
		 				<div>* Subject: </div>
		                <div class="form-group">
		                    <!-- <label  class="col-lg-3 control-label">* Subject:</label> -->
		                    <div class="col-lg-9">
		                        <input type="text" name="subject" class="form-control subject" placeholder="Your Subject" required>
		                    </div>
		                </div>
		                <div>* Message: </div>
		                <div class="form-group">
		                   <!--  <label class="col-lg-12 control-label pull-left">* Message:</label> -->
		                    <div class="col-lg-12">
		                        <textarea name="body" class="form-control rich" rows="6" placeholder="Your Message" required>
		                        </textarea>
		                    </div>
		                </div>

		                @if(Sentry::check())
		                <div class="form-group signedin">
		                    <div class="col-lg-12 text-right">
		                        <button type="submit" class="btn btn-send btn-info">Send</button>
		                    </div>
		                </div>
		                @else
		                
		                @endif
		              </form>   
			        </div>
			    </div><!-- end of modal-content -->
			  </div><!-- end of modal-dialog -->
			</div>
  <div id="scoreinfo" class="modal fade out in" aria-hidden="false">
    <div class="modal-content">
	    <div class="modal-body">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
	      <h3>How the Mafundi Score Works</h3>
	      <div id="scoresystem">
	        <div class="heading">
	        <h2>A Licensed technician Starts with <strong>90 Points</strong>.</h2>
	        <p>
	        <span class="before"></span>
	        Their score will increase or decrease based on these variables.
	        <span class="after"></span>
	        </p>
	        </div>
	        <div class="arrow  animated bounceInUp " id="plusone"></div>
	        <div class="arrow  animated bounceInUp delay" id="plustwo"></div>
	        <div class="arrow  animated bounceInUp delay2" id="plusthree"></div>
	        <div class="arrow  animated bounceInUp delay3" id="plusfour"></div>
	        <div class="arrow  animated bounceInUp delay4" id="plusfive"></div>
	        <div class="arrow down  animated bounceInDown delay5" id="minusone"></div>
	        <div class="arrow down  animated bounceInDown delay6" id="minustwo"></div>
	        <div class="arrow down  animated bounceInDown delay7" id="minusthree"></div>
	        <div class="description" id="positiveone">
	          <span class="icon"></span>
	          Positive Client Feedback
	        </div>
	        <div class="description" id="positivetwo">
	          <span class="icon"></span>
	          High BBB Rating &amp; Accreditation
	        </div>
	        <div class="description" id="positivethree">
	          <span class="icon"></span>
	          Project History
	        </div>
	        <div class="description" id="positivefour">
	          <span class="icon"></span>
	          Community Participation
	        </div>
	        <div class="description" id="positivefive">
	          <span class="icon"></span>
	          Profile Page Content
	          <ul>
	            <li>Employee Info</li>
	            <li>Years in Business</li>
	            <li>Contact Info</li>
	            <li>Project Photos</li>
	          </ul>
	        </div>
	        <div class="description" id="negativeone">
	          <span class="icon"></span>
	          Suspended or Inactive License
	        </div>
	        <div class="description" id="negativetwo">
	          <span class="icon"></span>
	          Negative Client Feedback
	        </div>
	        <div class="description" id="negativethree">
	          <span class="icon"></span>
	          Low BBB Rating
	        </div>
	      </div>
        </div>
    </div>
  </div>
</div>
    </div>
    </div>


	  <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
	  <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" "data-usebootstrapmodal"="false">
	    <!-- The container for the modal slides -->
	    <div class="slides"></div>
	    <!-- Controls for the borderless lightbox -->
	    <h3 class="image_title"></h3>
	    <a class="prev">‹</a>
	    <a class="next">›</a>
	    <a class="close">×</a>
	    <div class="modal fade">
	      <div class="modal-dialog">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" aria-hidden="true">×</button>
	            <h4 class="modal-title"></h4>
	          </div>
	          <div class="modal-body next"></div>
	          <div class="modal-footer"></div>
	        </div>
	      </div>
	    </div>
	  </div>

	  <div id="footer">
	  <!-- begin olark code -->

	</div>


	  <div class="clearfix"></div>

	  <!-- jQuery library (served from Google) 
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
		<!-- bxSlider Javascript file -->
		<script src="/bxslider/jquery.bxslider.min.js"></script>

	  <script type="text/javascript">
	  		$('.bxslider').bxSlider({
			  adaptiveHeight: true,
			  mode: 'fade'
			});
	  </script>

@stop
