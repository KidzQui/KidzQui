<!--
/**
* File: studentprofile.blade.php
* Path: resources/views/student/studentp;rofile.blade.php
* Purpose: To display the student profile details and its history
* Created On: 30-03-2017
* Last Modified On: 03-04-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'Profile')

@section('content')

  <!--about-->
  <div class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 best-left wow fadeInLeft animated" data-wow-delay=".5s">
          <h1>My Profile</h1><hr>
          <div class="col-md-4 about-left">
            <div class="history-grid-image">
              <img src={{ asset("KidzQuiApp/resources/assets/images/n3.jpg" ) }} class="img-responsive zoom-img" alt="">
            </div>
          </div>
          <div class="col-md-8 about-right">
            <h4>{{ $userProfile[0]->getField('ct_FullName') }}</h4><hr>
            <p>Email Address: {{ $userProfile[0]->getField('emailAddress_kqt') }}</p>
            <p>Phone Number: {{ $userProfile[0]->getField('phoneNumber_kqt') }}</p>
            <div class="col-md-2">
              <button type="button" class="btn btn-primary btn-block">Edit</button>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="about-top">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-9">
                  <h2>My Answers</h2>
                </div>
                <div class="col-md-3">
                    <h5><strong>Score: </strong>@php echo number_format($score, 2); @endphp %</h5>
                </div>
              </div>
            </div>
            <hr>
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Answer</th>
                </tr>
              </thead>
              <tbody>
                @if($records)
                  @foreach($records as $record)
                  <tr>
                    <td>
                      {{ $record->getField('__kf_QuestionId')}}
                    </td>
                    <td>
                      {{ $record->getField('studentAnswer_kqn') }}
                    </td>
                  </tr>

                  @endforeach
                @endif
              </tbody>
            </table>
            <div class="clearfix"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--//about-->

@stop

