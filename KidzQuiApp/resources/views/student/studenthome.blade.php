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
          <h3>Tutorials</h3><hr>

          @if($tutorials)
            @foreach($tutorials as $tutorial)

            <div class="bes-top col-md-8 col-xs-12 col-md-offset-3">
              <div class="bes-rgt">
                <h4><a href="singlepage">{{ $tutorial->getField('tutorialTitle_kqt') }}</a></h4>
                <p>&nbsp;&nbsp;&nbsp;{{ $tutorial->getField('tutorialDescription_kqt') }}</p><hr>
              </div>
              <div class="clearfix"></div>
            </div> <br><br>

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