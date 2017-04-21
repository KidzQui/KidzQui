<!--
/**
* File: student.blade.php
* Path: resources/views/layouts/student.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mentors Responsive Web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web template,
    Smartphone Compatible Web template, free Webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola Web design" />

    <title>@yield('title')</title>

    <!-- //Custom Theme files -->
    <link rel="stylesheet" href="{{ asset('KidzQuiApp/resources/assets/css/flexslider.css') }}" type="text/css" media="screen" />
    <link href="{{ asset('KidzQuiApp/resources/assets/css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('KidzQuiApp/resources/assets/css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('KidzQuiApp/public/css/custom.css?ver=1') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('KidzQuiApp/resources/assets/css/animate.css') }} " rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('KidzQuiApp/resources/assets/css/font-awesome.css') }}">

    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <!--/fonts-->

    @yield('header')

  </head>
  <body>
  <!--banner-->
  <div class="banner-1">
    <!--header-->
    <div class="header">
        <nav class="navbar navbar-default">
          <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav pull-left">
                <li><a href="{{ URL::to('studenthome') }}" >Home</a></li>
                <li><a href="{{ URL::to('studentprofile') }}" >My Profile</a></li>
              </ul>
            </div>
        </nav>
        <nav class="logo">
          <a class="navbar-brand" href="{{ URL::to('studenthome') }}">KidzQui</a>
        </nav>
        {{-- <div class="col-md-3 pull-right"> --}}
          <nav class="navbar navbar-default pull-right">
          <ul class="nav navbar-nav pull-right">
            <li><a href="{{URL::to('studentlogin')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
          </ul></nav>
        {{-- </div> --}}
        <div class="clearfix"> </div>
    </div>
    <!--//header-->
  </div>
  <!--//banner-->

  @yield('content')

<!--footer-->
  <div class="footer">
    <div class="container">
        <div class="clearfix"></div>
      <div class="copy animated wow fadeInUp animated animated" data-wow-duration="1200ms" data-wow-delay="500ms">
        <p>© KidzQui - Online Maths Tutor by <a href="https://mindfiresolutions.com">Mindfire</a></p>
      </div>
    </div>
  </div>
<!--footer-->

  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- js -->
  <script src="{{ asset('KidzQuiApp/resources/assets/js/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('KidzQuiApp/resources/assets/js/bootstrap.js') }}"> </script>

@yield('footer')

  </body>
</html>