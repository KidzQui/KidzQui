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

@section('title', 'Quiz')

@section('header')

<link href="{{ asset('KidzQuiApp/resources/assets/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
<!-- Font Awesome -->
<link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('KidzQuiApp/public/css/custom.css') }}" rel="stylesheet" type="text/css">

@stop

@section('content')

<div class="panel col-md-12">
  {{-- <a class="col-md-2 btn btn-primary" href="{{ URL::to('') }}" >Go Back</a> --}}
</div>
<!--best-->
<div class="best">
  <div class="container">
    <div class="row">
      <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
        <h3>
          <a href="{{ URL::to('levels')}}">Level {{ Session::get('level') }} </a> /
          <a href="{{ URL::to('sets', Session::get('level'))}}">
          Set {{ Session::get('set') }}</a> / Questions
        </h3>
         <hr>

        @if($questions)
          @php $i = 0;  @endphp

            <form action="../score" method="POST">
              @foreach($questions as $question)

                <div class="panel bes-top col-md-5 col-md-offset-3" id="{{ $question->getField('___kp_QuestionId') }}">
                  <h4>{{ $i+1 }}. {{ $question->getField('questionText_kqt') }}</h4>
                  <ul class="answers text-center">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="question{{ $question->getField('___kp_QuestionId') }}" value="{{ $question->getField('___kp_QuestionId') }}">
                      <input type="hidden" name="answer{{ $question->getField('___kp_QuestionId') }}" value="{{ $choices[1][$i] }}">

                      @foreach($choices[0][$i] as $choice)

                        <li>
                          <input type="radio" name="choice{{ $question->getField('___kp_QuestionId') }}" value="{{ $choice }}">&nbsp;&nbsp;{{ $choice }}
                        </li>

                      @endforeach

                  </ul>
                </div>

                @php $i += 1;  @endphp
              @endforeach

              <div class="col-md-3 col-xs-3 col-md-offset-5">
                <button class="btn btn-success btn-lg btn-group-justified" type="submit" name="submit"><strong>Submit</strong></button>
              </div>
            </form>

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

  <script>
    $("div.").live("click", function(event){
        event.preventDefault();
        $(this).next('.show-more').toggle();
    });
  </script>
  <script src="{{ asset('KidzQuiApp/resources/assets/js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
  <!--//end-animate-->

@stop