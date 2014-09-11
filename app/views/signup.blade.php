@extends('layouts.master')

@section('main')
<html lang="en"><head>
<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script type="text/javascript" async="" src="http://cdn.mxpnl.com/libs/mixpanel-2.2.min.js"></script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-2.newrelic.com","errorBeacon":"jserror.newrelic.com","licenseKey":"441a86fa0c","applicationID":"2788934","transactionName":"dlhbQEMMWllQEB1GAVJeRkBDAkJcWgxBGwpQQA==","queueTime":0,"applicationTime":13,"ttGuid":"","agentToken":null,"agent":"js-agent.newrelic.com/nr-397.min.js"}</script>
<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"UA4DVl5WGwEHXFlbBAU="};window.NREUM||(NREUM={}),__nr_require=function t(e,n,r){function o(i){if(!n[i]){var a=n[i]={exports:{}};e[i][0].call(a.exports,function(t){var n=e[i][1][t];return o(n?n:t)},a,a.exports,t,e,n,r)}return n[i].exports}if("function"==typeof __nr_require)return __nr_require;for(var i=0;i<r.length;i++)o(r[i]);return o}({1:[function(t,e){function n(t,e,n){n||(n={});for(var r=o[t],a=r&&r.length||0,s=n[i]||(n[i]={}),u=0;a>u;u++)r[u].apply(s,e);return s}function r(t,e){var n=o[t]||(o[t]=[]);n.push(e)}var o={},i="nr@context";e.exports={on:r,emit:n}},{}],2:[function(t){function e(t,e,o,a,u){return s?s-=1:n("err",[u||new UncaughtException(t,e,o)]),"function"==typeof i?i.apply(this,r(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}var n=t("handle"),r=t(6),o=t(5),i=window.onerror,a=!1,s=0;t("loader").features.push("err"),window.onerror=e;try{throw new Error}catch(u){"stack"in u&&(t(1),t(2),"addEventListener"in window&&t(3),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(4),a=!0)}o.on("fn-start",function(){a&&(s+=1)}),o.on("fn-err",function(t,e,r){a&&(this.thrown=!0,n("err",[r,(new Date).getTime()]))}),o.on("fn-end",function(){a&&!this.thrown&&s>0&&(s-=1)}),o.on("internal-error",function(t){n("ierr",[t,(new Date).getTime(),!0])})},{1:5,2:4,3:3,4:6,5:1,6:14,handle:"D5DuLP",loader:"G9z0Bl"}],3:[function(t){function e(t){r.inPlace(t,["addEventListener","removeEventListener"],"-",n)}function n(t){return t[1]}var r=t(1),o=(t(3),t(2));if(e(window),"getPrototypeOf"in Object){for(var i=document;i&&!i.hasOwnProperty("addEventListener");)i=Object.getPrototypeOf(i);i&&e(i);for(var a=XMLHttpRequest.prototype;a&&!a.hasOwnProperty("addEventListener");)a=Object.getPrototypeOf(a);a&&e(a)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&e(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=e["nr@wrapped"]?t[1]=e["nr@wrapped"]:e["nr@wrapped"]=t[1]=r(e,"fn-"):"function"==typeof e.handleEvent&&r.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:15,2:1,3:14}],4:[function(t){var e=(t(3),t(1)),n=t(2);e.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=e(t[0],"fn-")})},{1:15,2:1,3:14}],5:[function(t){function e(t){var e=t[0];"string"==typeof e&&(e=new Function(e)),t[0]=n(e,"fn-")}var n=(t(3),t(1)),r=t(2);n.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",e)},{1:15,2:1,3:14}],6:[function(t){function e(){o.inPlace(this,s,"fn-")}function n(t,e){o.inPlace(e,["onreadystatechange"],"fn-")}function r(t,e){return e}var o=t(1),i=t(2),a=window.XMLHttpRequest,s=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];window.XMLHttpRequest=function(t){var n=new a(t);return i.emit("new-xhr",[],n),o.inPlace(n,["addEventListener","removeEventListener"],"-",function(t,e){return e}),n.addEventListener("readystatechange",e,!1),n},window.XMLHttpRequest.prototype=a.prototype,o.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",r),i.on("send-xhr-start",n),i.on("open-xhr-start",n)},{1:15,2:1}],7:[function(t){function e(){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;u>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,d="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,p=e(d);if(p&&(r.rxSize=p),this.sameOrigin){var f=t.getResponseHeader("X-NewRelic-App-Data");f&&(n.cat=f.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}t("loader").features.push("xhr");var o=t("handle"),i=t(1),a=t(5),s=["load","error","abort","timeout"],u=s.length,d=t(2);t(3),t(4),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var d=e(o);d&&(r.txSize=d)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){a.emit("internal-error",e)}};for(var p=0;u>p;p++)n.addEventListener(s[p],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+d(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+d(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)&&e()},{1:8,2:11,3:3,4:6,5:1,handle:"D5DuLP",loader:"G9z0Bl"}],8:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],D5DuLP:[function(t,e){function n(t,e){var n=r[t];return n?n.apply(this,e):(o[t]||(o[t]=[]),void o[t].push(e))}var r={},o={};e.exports=n,n.queues=o,n.handlers=r},{}],11:[function(t,e){function n(t){if(!t||"object"!=typeof t&&"function"!=typeof t)return-1;if(t===window)return 0;if(o.call(t,"__nr"))return t.__nr;try{return Object.defineProperty(t,"__nr",{value:r,writable:!0,enumerable:!1}),r}catch(e){return t.__nr=r,r}finally{r+=1}}var r=1,o=Object.prototype.hasOwnProperty;e.exports=n},{}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],G9z0Bl:[function(t,e){function n(){var t=c.info=NREUM.info;if(t&&t.agent&&t.licenseKey&&t.applicationID){c.proto="https"===f.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=u.createElement("script");e.src=c.proto+t.agent,u.body.appendChild(e)}}function r(){"complete"===u.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=window,u=s.document,d="addEventListener",p="attachEvent",f=(""+location).split("?")[0],c=e.exports={offset:i(),origin:f,features:[]};u[d]?(u[d]("DOMContentLoaded",o,!1),s[d]("load",n,!1)):(u[p]("onreadystatechange",r),s[p]("onload",n)),a("mark",["firstbyte",i()])},{handle:"D5DuLP"}],14:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],15:[function(t,e){function n(t,e,n,r){function nrWrapper(){try{var a,u=s(arguments),d=this,p=n&&n(u,d)||{}}catch(f){i([f,"",[u,d,r],p])}o(e+"start",[u,d,r],p);try{return a=t.apply(d,u)}catch(c){throw o(e+"err",[u,d,c],p),c}finally{o(e+"end",[u,d,a],p)}}return t&&"function"==typeof t&&t.apply&&!t._wrapped?(e||(e=""),nrWrapper._wrapped=!0,nrWrapper):t}function r(t,e,r,o){r||(r="");var i,a,s,u="-"===r.charAt(0);for(s=0;s<e.length;s++)a=e[s],i=t[a],i&&"function"==typeof i&&i.apply&&!i._wrapped&&(t[a]=n(i,u?a+r:r,o,a,t))}function o(t,e,n){try{a.emit(t,e,n)}catch(r){i([r,t,e,n])}}function i(t){try{a.emit("internal-error",t)}catch(e){}}var a=t(1),s=t(2);e.exports=n,n.inPlace=r},{1:1,2:14}]},{},["G9z0Bl",2,7]);</script>
  

  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css"> -->
  <!-- <link href="http://assets.buildzoom.com/assets/registrations-38a7377b62a86a739486b0e69225aa7c.css" media="all" rel="stylesheet" type="text/css"> -->
  {{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
  {{ HTML::style('/assets/css/sign/signup.css') }}

  {{ HTML::script('/assets/js/signup.js') }}

  <!-- start Mixpanel -->
  <script type="text/javascript">
//<![CDATA[

(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
  mixpanel.init("bc909ad7df22b2b71c176cd0a37f749f");

//]]>
</script><!-- end Mixpanel -->

      <script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-15886463-1']);_gaq.push(['_setSiteSpeedSampleRate',10]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>

        <script src="//cdn.optimizely.com/js/255671052.js"></script>


  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->



  <meta content="authenticity_token" name="csrf-param">
<meta content="+5j/26HlxGVesG8INwcLuEyveYn/TVe+kIbPbn+YMAE=" name="csrf-token">
  
<style type="text/css"></style></head>

    <body class="registrations new">
        
        
        
<section id="main" class="reg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- <a href="http://www.buildzoom.com/"><div id="biglogo"></div></a> -->
        <div id="signup">
          <div id="free"></div>
          <h3 class="space2">Get Started</h3>
            <ul id="signuptabs" class="nav-tabs nav">
              <li class="active">
                <a href="#contractor_form" data-toggle="tab">I'm a Fundi.</a>
              </li>
              <li class="">
                <a href="#homeowner_form" data-toggle="tab">I'm a User.</a>
              </li>
            </ul>
              <div class="signup content tab-content">
                <!-- start contractor form -->
                <div class="tab-pane active part-form " id="contractor_form">
                  <!-- <strong>Share your work with millions of homeowners. It's free!</strong> -->
                  <form accept-charset="UTF-8" action="{{ route('csignup') }}" class="new_contractor_signup_form" id="new_contractor_signup_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="+5j/26HlxGVesG8INwcLuEyveYn/TVe+kIbPbn+YMAE="></div>
  

                        <input id="hdn_type" name="hdn_type" type="hidden" value="contractor">
                        <input id="contractor_signup_form_contractor_id" name="contractor_signup_form[contractor_id]" type="hidden" value="">
                          <input id="contractor_signup_form_claim" name="contractor_signup_form[claim]" type="hidden" value="false">
                          <!-- First Name -->
                          <div class="control-group{{ $errors->first('first_name', ' error') }}">
                            <label class="control-label" for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
                            <span class="input-group-addon icon user"></span>
                            <br>{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
                          </div><br>

                          <!-- Last Name -->
                          <div class="control-group{{ $errors->first('last_name', ' error') }}">
                            <label class="control-label" for="last_name">LastName</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
                            <span class="input-group-addon icon user"></span>
                            <br>{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
                          </div>

                          <div class="form-group">
                            <label for="contractor_signup_form_business_name">Business Name</label>
                            <div class="input-group">
                              <input class="form-control" id="contractor_signup_form_business_name" name="contractor_signup_form[business_name]" placeholder="Utalli Co. Ltd" size="30" type="text">
                              <!-- value: (params[:hdn_name].present? ? params[:hdn_name]: "") -->
                              <span class="input-group-addon icon business"></span>
                            </div>
                          </div>

                        <div class="form-group">
                          <label class="control-label" for="contractor_signup_form_email">Email</label>
                          <div class="input-group">
                              <input class="form-control" id="contractor_signup_form_email" name="contractor_signup_form[email]" placeholder="name@email.com" size="30" type="email">
                            <span class="input-group-addon icon email"></span>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="form-group col-lg-6 col-xs-12">
                            <label for="contractor_signup_form_phone">Phone</label>
                            <div class="input-group">
                                <input class="form-control" id="contractor_signup_form_phone" maxlength="14" name="contractor_signup_form[phone]" placeholder="254 714 019 079" size="14" type="text">
                              <span class="input-group-addon icon phone"></span>
                            </div>
                          </div>
                          
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label for="contractor_signup_form_password">Password</label>
                          <div class="input-group">
                            <input class="form-control" id="contractor_signup_form_password" name="contractor_signup_form[password]" placeholder="password" size="30" type="password">
                            <span class="input-group-addon icon password"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="contractor_signup_form_password">Password</label>
                          <div class="input-group">
                            <input class="form-control" id="contractor_signup_form_password" name="contractor_signup_form[password]" placeholder="password" size="30" type="password">
                            <span class="input-group-addon icon password"></span>
                          </div>
                        </div>
                        <hr>
                          <input class="green button btn" data-disable-with="Processing ..." name="commit" type="submit" value="Sign up">
                      </form>
                </div>
                <!-- end contractor form -->

                <!-- start homeowner_form -->
                <div class="tab-pane part-form " id="homeowner_form">
                  <!-- <strong>We've already helped 50,000 homeowners.</strong> -->
                  <form accept-charset="UTF-8" action="{{ route('signup') }}" class="new_homeowner_form" id="new_homeowner_form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"><input name="authenticity_token" type="hidden" value="+5j/26HlxGVesG8INwcLuEyveYn/TVe+kIbPbn+YMAE="></div>
    
                    <input id="hdn_type" name="hdn_type" type="hidden" value="homeowner">
                      <!-- <div class="form-group">
                        <label for="homeowner_form_first_name">Your name</label>
                        <div class="input-group">
                          <input class="form-control" id="homeowner_form_first_name" name="homeowner_form[first_name]" placeholder="John Smith" size="30" type="text">
                          <span class="input-group-addon icon user"></span>
                        </div>
                      </div> -->
                      <!-- First Name -->
                      <div class="control-group{{ $errors->first('first_name', ' error') }}">
                        <label class="control-label" for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
                        <span class="input-group-addon icon user"></span>
                        <br>{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
                      </div><br>

                      <!-- Last Name -->
                      <div class="control-group{{ $errors->first('last_name', ' error') }}">
                        <label class="control-label" for="last_name">LastName</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
                        <span class="input-group-addon icon user"></span>
                        <br>{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
                      </div>

                      <!-- Email -->
                      <div class="control-group{{ $errors->first('email', ' error') }}">
                        <label class="control-label" for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ Input::old('email') }}" placeholder="Email"/>
                        <span class="input-group-addon icon email"></span>
                        <br>{{ $errors->first('email', '<span class="help-block">:message</span>') }}
                      </div>

                      <!-- Password -->
                      <div class="control-group{{ $errors->first('password', ' error') }}">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password"/>
                        <span class="input-group-addon icon password"></span>
                        <br>{{ $errors->first('password', '<span class="help-block">:message</span>') }}
                      </div>

                      <!-- Password Confirm -->
                      <div class="control-group{{ $errors->first('password_confirm', ' error') }}">
                        <label class="control-label" for="password_confirm">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" value="" placeholder="Re-Type Password" />
                        <span class="input-group-addon icon password"></span>
                        <br>{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
                      </div>            
                          
                      <button class="green button btn" type="submit">Sign Up</button>
                    </form>
                </div>
                <!-- end homeowner form -->
              </div>
          <a href="/auth/signin">Already have an account?  Sign In</a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</section>

  <div id="possible-match-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Is your business listed below?</h3>
      </div>
      <div class="modal-body">
        <div class="space1">
          <div>
            <p>If your business is listed below, please click the button next to your business name and click, "Yes, this is my business!" This will make sure that any information we have already found about your business will be automatically added to your profile. </p>
            <p>
            If your business is not listed, simply click "No, my business is not listed." and we will build a new profile for you from scratch.</p>
          </div>
        </div>
        <form id="matches">
        </form>
      </div>
      <div class="modal-footer">
        <div class="pull-center">
          <input class=" btn btn-primary" data-disable-with="Processing..." id="this-is-my-business" name="commit" type="submit" value="Yes, this is my business!">
          <button class="btn" id="not-my-business" data-dismiss="modal" aria-hidden="true">No, my business is not listed.</button>
        </div>
      </div>
      </div>
    </div><!-- end of modal-content -->
  </div><!-- end of modal-dialog -->



  <div class="clearfix"></div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
        
    

<script src="http://js-agent.newrelic.com/nr-397.min.js"></script><script type="text/javascript" src="http://beacon-2.newrelic.com/1/441a86fa0c?a=2788934&amp;ap=13&amp;be=572&amp;fe=1780&amp;dc=620&amp;v=397.04850f5&amp;to=dlhbQEMMWllQEB1GAVJeRkBDAkJcWgxBGwpQQA%3D%3D&amp;f=%5B%22err%22,%22xhr%22%5D&amp;jsonp=NREUM.setToken&amp;perf=%7B%22timing%22:%7B%22of%22:1398261548599,%22n%22:0,%22dl%22:561,%22di%22:1191,%22ds%22:1192,%22de%22:1331,%22dc%22:2350,%22l%22:2351,%22le%22:2359,%22f%22:0,%22dn%22:0,%22dne%22:0,%22c%22:0,%22ce%22:0,%22rq%22:45,%22rp%22:530,%22rpe%22:560%7D,%22navigation%22:%7B%7D%7D"></script></body></html>

@stop

@section('mai')

<form method="post" action="{{ route('signup') }}" class="form-horizontal form-signin" autocomplete="off">
  <!-- CSRF Token -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <h2 class="form-signin-heading" style="background:#298A08;">Register</h2>
  <div class="login-wrap">

    <!-- First Name -->
    <div class="control-group{{ $errors->first('first_name', ' error') }}">
      <!-- <label class="control-label" for="first_name">First Name</label> -->
      <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Input::old('first_name') }}" placeholder="First Name"/>
      <br>{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Last Name -->
    <div class="control-group{{ $errors->first('last_name', ' error') }}">
      <!-- <label class="control-label" for="last_name">Last Name</label> -->
      <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Input::old('last_name') }}" placeholder="Last Name"/>
      <br>{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Email -->
    <div class="control-group{{ $errors->first('email', ' error') }}">
      <!-- <label class="control-label" for="email">Email</label> -->
      <input type="text" name="email" id="email" class="form-control" value="{{ Input::old('email') }}" placeholder="Email"/>
      <br>{{ $errors->first('email', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Password -->
    <div class="control-group{{ $errors->first('password', ' error') }}">
      <!-- <label class="control-label" for="password">Password</label> -->
      <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password"/>
      <br>{{ $errors->first('password', '<span class="help-block">:message</span>') }}
    </div>

    <!-- Password Confirm -->
    <div class="control-group{{ $errors->first('password_confirm', ' error') }}">
      <!-- <label class="control-label" for="password_confirm">Confirm Password</label> -->
      <input type="password" name="password_confirm" id="password_confirm" class="form-control" value="" placeholder="Re-Type Password" />
      <br>{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
    </div>

    
    <!-- Agree to Terms Of Service -->
    <div class="control-group{{ $errors->first('terms', ' error') }}">
          <!-- <label class="checkbox" for="terms"> -->
            <!-- <input type="hidden" name="terms" value="off" /> -->
            <input type="checkbox" name="terms" id="terms" {{ Input::old('terms') }} />
              By signin up you agree to the <a href="/tos">Terms of Service</a>
          </label>
      {{ $errors->first('terms', '<span class="help-block">:message</span>') }}
    </div>
        
        <button class="btn btn-login" type="submit">Sign Up</button>

        <div class="registration">
            Already Registered?
            <a class="pull-right" href="{{ route('signin') }}">
                Login
            </a>
        </div>
    </div>
</form>
@stop
