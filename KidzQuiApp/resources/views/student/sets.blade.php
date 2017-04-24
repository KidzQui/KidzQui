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

<!--best-->
  <div class="best">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <h3><a href="{{ URL::to('levels')}}">Level {{ Session::get('level') }} </a>/ Sets</h3><hr>

          @if($sets)
            @php $i = 0; @endphp
            @foreach($sets as $set)

              <div class="container well">
                <div class="col-md-3">
                    <h4>{{ $i+1 }}. {{ $set->getField('setName_kqt') }}</h4>
                </div>

                @if($sets)
                  @foreach($questionTypes as $questionType)

                    <div class="col-md-3 text-center">
                      <form action="../questions/{{ $set->getField('___kp_SetId') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="setid" value="{{ $set->getField('___kp_SetId') }}">
                        <input type="hidden" name="questiontype" value="{{ $questionType->getField('___kp_QuestionTypeId') }}">
                        <button type="submit" class="btn btn-info btn-block btn-lg">{{ $questionType->getField('questionType_kqt') }}</button>
                      </form>
                    </div>

                  @endforeach
                @endif
              </div>

              @php $i += 1; @endphp
            @endforeach
          @endif

          </div>
        </div>
      </div>
      <div class="clearfix"></div>
  </div>
<!--best-->

@stop

@section('footer')
<script src="{{ asset('KidzQuiApp/resources/assets/js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
@stop