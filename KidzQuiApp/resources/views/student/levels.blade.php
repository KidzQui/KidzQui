<!--
/**
* File: staff.blade.php
* Path: resources/views/student/staff.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'Levels')

@section('content')

<!--staff-->
<div class="best"></div>
  <div class="staff">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">

          @if($levels)
            @foreach($levels as $level)

              <div class="col-md-4 staff-left">
                <form action="sets" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="levelid" value="{{ $level->getField('___kp_LevelId') }}">
                  <button class="btn btn-default thumbnail btn-group-justified" type="submit">
                    <strong><h4>Level {{ $level->getField('___kp_LevelId') }}</h4></strong>
                  </button>
                </form>
              </div>

            @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@stop
