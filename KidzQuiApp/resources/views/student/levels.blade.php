<!--
/**
* File: levels.blade.php
* Path: resources/views/student/levels.blade.php
* Purpose: To display of levels on student app
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
                <a href="{{ URL::to('sets', $level->getField('___kp_LevelId')) }}" class="btn btn-default thumbnail btn-group-justified">
                <h4 class="level">Level: {{ $level->getField('___kp_LevelId') }}</h4></a>
              </div>

            @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@stop
