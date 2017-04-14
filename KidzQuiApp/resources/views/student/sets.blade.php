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

<link rel="stylesheet" href="{{ asset('KidzQuiApp/public/css/custom.css') }}">
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

@stop

@section('content')

<!--best-->
  <div class="best">
    <div class="container">
      <div class="row">
        <h3>Sets</h3><hr>
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">

          @if($sets)
            @foreach($sets as $set)
              <div class="col-md-4">
                  <h4>{{ $set->getField('___kp_SetId') }} {{ $set->getField('setName_kqt') }}</h4>
              </div>
              <div class="col-md-8"></div>
                @if($sets)
                  @foreach($questionTypes as $questionType)
                      <div class="col-md-2">
                        <h4>{{ $questionType->getField('___kp_QuestionTypeId') }} {{ $questionType->getField('questionType_kqt') }}</h4>
                        <form action="questions" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="level" value="{{ $level }}">
                          <input type="hidden" name="set" value="{{ $set->getField('___kp_SetId') }}">
                          <input type="hidden" name="questiontype" value="{{ $questionType->getField('___kp_QuestionTypeId') }}">
                          <button type="submit" class="btn btn-success">Solve</button>
                        </form>
                      </div>
                  @endforeach
                @endif
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

  <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
  <!--//end-animate-->

@stop