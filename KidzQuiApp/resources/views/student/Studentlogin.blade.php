<!--
/**
* File: Studentlogin.blade.php
* Path: resources/views/evaluators/studentlogin.blade.php
* Purpose: The login page of the student module
* Created On: 17-04-2017
* Last Modified On: 17-04-2017
* Author: MOHIT DADU
*/
-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Awesome Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />

<!-- css files -->
<link rel="stylesheet" href="{{ asset('KidzQuiApp/resources/assets/css/login.css') }}" type="text/css" media="all" />
<!-- Style-CSS -->
<link rel="stylesheet" href="{{ asset('KidzQuiApp/resources/assets/css/font-awesome.css') }}"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Philosopher:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,vietnamese" rel="stylesheet">
<!-- //web-fonts -->

</head>
<body>
<div data-vide-bg="video/social2">
  <div class="center-container">
    <!--header-->
    <div class="header-w3l">
      <h1>KidzQui</h1>
    </div>
    <!--//header-->
    <!--main-->
    <div class="main-content-agile">
      <div class="wthree-pro">
        <h2>Login</h2>
      </div>
      <div class="sub-main-w3">
        <form action="studentindex" type="get">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div>
            <input placeholder="E-mail" name="username" type="email" required="">
            <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
          </div>
          <div>
            <input  placeholder="Password" name="password" type="password" required="">
            <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
          </div>
          <div>
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
    <!--//main-->
    <!--footer-->
    <div class="footer">
      <p>&copy; kidzQui | Design by <a href="http://mindfiresolutions.com">mindfire Solutions</a></p>
    </div>
    <!--//footer-->
  </div>
</div>
<!-- js -->
<script type="text/javascript" src="{{ asset('KidzQuiApp/resources/assets/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('KidzQuiApp/resources/assets/js/jquery.vide.min.js') }}"></script>
<!-- //js -->
</body>
</html>