<!--
/**
* File: studenthome.blade.php
* Path: resources/views/student/studenthome.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'Home')

@section('content')

<!--students-->
  <div class="students">
    <div class="row well">
      <div class="col-md-12">
        <a href="{{ URL::to('levels') }}" class="btn btn-info btn-lg col-md-2" style="margin-left: 40%">Start Quiz </a>
      </div>
    </div>
  </div>
<!--//students-->
<!--best-->
  <div class="best">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <h3>Tutorials</h3>

          @if($tutorials)
            @foreach($tutorials as $tutorial)

            <div class="bes-top col-md-6">
              <div class="bes-lft">
                <div class="history-grid-image">
                  <img src={{ asset("KidzQuiApp/resources/assets/images/t8.jpg") }} class="img-responsive zoom-img" alt="">
                </div>
              </div>
              <div class="bes-rgt">
                <h4><a href="singlepage">{{ $tutorial->getField('tutorialTitle_kqt') }}</a></h4>
                <p>{{ $tutorial->getField('tutorialDescription_kqt') }}</p>
              </div>
              <div class="clearfix"></div>
            </div>

            @endforeach
          @endif

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
<!--best-->

@stop

@section('footer')

<script src="{{ asset('KidzQuiApp/resources/assets/js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
  <!--//end-animate-->

@stop