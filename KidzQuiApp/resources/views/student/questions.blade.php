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

@section('header')

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

@stop

@section('content')

  <div class="panel col-md-12">
    <a class="col-md-2 btn btn-primary" href="{{ URL::to('sets') }}" >Go Back</a>
  </div>
<!--best-->
  <div class="best">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <h3>Questions</h3>

          @if($questions)

            @foreach($questions as $question)

              <div class="panel bes-top col-md-6 col-md-offset-3">
                <div class="bes-lft">
                  <div class="history-grid-image">
                    <img src={{ asset("KidzQuiApp/resources/assets/images/t8.jpg") }} class="img-responsive zoom-img" alt="">
                  </div>
                </div>
                <div class="bes-rgt">
                  <p>{{ $question->getField('questionText_kqt') }}</p>
                </div>
                <div class="clearfix"></div>
              </div>

            @endforeach

            <div class="col-md-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @else
              <div class="col-md-12">
                <h4>Sorry! Question will Come Soon. :)</h4>
              </div>
          @endif

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
<!--best-->

@stop

@section('footer')

  <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
  <!--//end-animate-->

@stop