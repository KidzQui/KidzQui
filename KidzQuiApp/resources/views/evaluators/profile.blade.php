<!--
/**
* File: profile.blade.php
* Path: resources/views/evaluators/profile.blade.php
* Purpose: The layout to display the profile details
* Created On: 22-03-2017
* Last Modified On: 11-04-2017
* Author: R S DEVI PRASAD, Mohit Dadu
*/
-->

@extends('layouts.app')

@section('title', 'Student Details')

@section('header')

    <!-- Bootstrap -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

@stop

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>My Profile</h3>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                {{-- <h2>User Report <small>Activity report</small></h2> --}}
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img src="imagedata?url={{ Session::get('mediaId') }}" alt="profile image" class="img-responsive">
                    </div>
                  </div>

                  <h3>{{ $userProfile['profile'][0]->getField('ct_FullName') }}</h3>

                  <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope-o user-profile-icon"></i> {{ $userProfile['profile'][0]->getField('emailAddress_kqt') }}
                    </li>

                    <li>
                      <i class="fa fa-mobile user-profile-icon"></i> {{ $userProfile['profile'][0]->getField('phoneNumber_kqt') }}
                    </li>
                  </ul>
                  <a id="editprofile" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                  <br />

                  <div id="editdiv" class="well no-display">
                    <form action="editdetails" method="POST">
                      <input type="hidden" name="_token" value={{ csrf_token() }}>
                      <input type="hidden" name="recordid" value="{{ $userProfile['profile'][0]->getRecordId() }}">
                      <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $userProfile['profile'][0]->getField('firstName_kqt') }}">
                        @if ($errors->has('firstname'))
                          <span>
                            <strong>{{ $errors->first('firstname') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $userProfile['profile'][0]->getField('lastName_kqt') }}">
                        @if ($errors->has('lastname'))
                          <span>
                            <strong>{{ $errors->first('lastname') }}</strong>
                          </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="emailaddress" value="{{ $userProfile['profile'][0]->getField('emailAddress_kqt') }}">
                        @if ($errors->has('emailaddress'))
                          <span>
                            <strong>{{ $errors->first('emailaddress') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" name="phonenumber" value="{{ $userProfile['profile'][0]->getField('phoneNumber_kqt') }}">
                        @if ($errors->has('phonenumber'))
                          <span>
                            <strong>{{ $errors->first('phonenumber') }}</strong>
                          </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-warning pull-right">Save</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Added Questions</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Recent Added Tutorials</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent Questions -->
                        <ul class="messages">

                          @if($userProfile['questions'])
                            @foreach ($userProfile['questions'] as $question)

                          <li>
                            <div class="message_date">
                              <h5 class="date text-error">Created On:</h5>
                              <p class="month">{{ $question->getField('createdOn_kqd') }}</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="date text-error">Question:</h4>
                              <blockquote class="message">{{ $question->getField('questionText_kqt') }}.</blockquote>
                              <h5>Question Type: {{ $question->getField('__kf_QuestionTypeId') }}</h5>
                              <h5>Level: {{ $question->getField('__kf_LevelId') }}</h5>

                              <h5>Set: {{ $question->getField('__kf_SetId') }}</h5>
                            </div>
                          </li>

                            @endforeach
                          @endif

                        </ul>
                        <!-- end recent Questions -->
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <!-- start recent tutorials -->
                        <ul class="messages">

                          @if($userProfile['tutorials'])
                            @foreach ($userProfile['tutorials'] as $tutorial)

                          <li>
                            <div class="message_date">
                              <h5 class="date text-error">Created On:</h5>
                              <p class="month">{{ $tutorial->getField('createdOn_kqd') }}</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="date text-error">Tutorial:</h4>
                              <blockquote class="message">{{ $tutorial->getField('tutorialTitle_kqt') }}.</blockquote>
                              <h5>Question Type: {{ $tutorial->getField('tutorialDescription_kqt') }}</h5>
                            </div>
                          </li>

                            @endforeach
                          @endif

                        </ul>
                        <!-- end recent Tutorials -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

@stop

@section('footer')

    <!-- Bootstrap -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- morris.js -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/morris.js/morris.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/js/custom.min.js') }}"></script>
    <script type="text/javascript">
      $("#editprofile").on('click', function() {
        $("#editdiv").toggle('.no-display');
      });
    </script>

@stop