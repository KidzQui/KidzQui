<!--
/**
* File: score.blade.php
* Path: resources/views/student/score.blade.php
* Purpose: To display score of the student
* Created On: 18-04-2017
* Last Modified On: 18-04-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'My Score')

@section('content')

<!--staff-->
<div class="best"></div>
  <div class="staff">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <div class="col-md-4 col-md-offset-4 ">
          <h3>Your Score: {{ $score }}</h3>
            <form action="sets" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="levelid" value="{{ Session::get('level') }}">
              <button class="btn btn-primary btn-lg btn-group-justified" type="submit">
                <strong><h4>OK</h4></strong>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
