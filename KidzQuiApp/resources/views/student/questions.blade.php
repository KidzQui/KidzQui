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
                @foreach($questions as $question)

                  <div class="panel bes-top col-md-6 col-md-offset-3">
                      <h4>{{ $i+1 }}. {{ $question->getField('questionText_kqt') }}</h4>
                    <div class="clearfix"></div>
                    <div class="bes-rgt">
                      <ul class="answers">

                        @foreach($choices[$i] as $choice)
                          <div>
                            <h5>{{ $choice }}</label>
                          </div>
                        @endforeach
                        <input type="text" name="answer" id="answer">
                        @php $i += 1;  @endphp
                      </ul>
                    </div>
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