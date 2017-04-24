<!--
/**
* File: login.blade.php
* Path: resources/views/evaluators/login.blade.php
* Purpose: The login page of the evaluator module
* Created On: 22-03-2017
* Last Modified On: 23-03-2017
* Author: R S DEVI PRASAD
*/
-->

@extends('layouts.main')

@section('title', 'Login')

@section('header')

    <!-- Bootstrap -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/css/custom.min.css?ver=1') }}" rel="stylesheet">

@stop

@section('content')

<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="evaluatorindex" type="get">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <h1>Login Form</h1>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="errorMessage pull-left" style="color:red">@if ($errors->has('username')) {{ $errors->first('username') }} @endif</span>
              </div><br>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="errorMessage pull-left" style="color:red">@if ($errors->has('password')) {{ $errors->first('password') }} @endif</span>
              </div><br>
              <div>
                <button class="btn btn-default submit" type="submit">Log in</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

@stop
