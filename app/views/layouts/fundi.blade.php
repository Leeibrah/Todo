<!DOCTYPE HTML>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf8" />

 @yield('css')
 @yield('js')
    @if( Request::segment(3) == 'edit' || Request::segment(3) == 'create' )
        {{ HTML::style(All::b().'assets/bootstrap-fileupload/bootstrap-fileupload.css') }}
    @endif

  
 <body>

    <div class="container" style="position: relative;min-height: 440px; margin-top:5%; margin-bottom:5%;">
      @if (Session::has('message'))
        <div class="flash alert">
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif

      @yield('main')
    </div>
    <footer style="background-color:#298A08;">
    </footer>
    
  </body>

</html>