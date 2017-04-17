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
          <h3>Questions</h3>

          @if($questions)
            @php $i = 0;  @endphp

            <form action="answerdata" method="POST">

              @foreach($questions as $question)

                <div class="panel bes-top col-md-5 col-md-offset-3">
                  <h4>{{ $i+1 }}. {{ $question->getField('questionText_kqt') }}</h4>
                  <ul class="answers text-center">

                    @foreach($choices[$i] as $choice)

                      <li>
                        <i class="fa fa-circle-o fa-sm" aria-hidden="true"></i>&nbsp;&nbsp;{{ $choice }}
                      </li>

                    @endforeach
                  </ul>
                  <div class="text-center">
                    {{-- <label for="answer">Answer:</label> --}}
                    <input type="text" class="form-control text-center" name="answer" id="{{ $question->getField('___kp _QuestionId') }}" placeholder="Your Answer.....">
                  </div>

                  @php $i += 1;  @endphp

                </div>

              @endforeach
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-md-3 col-md-offset-5 text-right">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
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

  <script src="{{ asset('KidzQuiApp/resources/assets/js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
  <!--//end-animate-->

@stop