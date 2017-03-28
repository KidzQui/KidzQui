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

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>
            </div>
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
                      <img class="img-responsive avatar-view" src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/picture.jpg') }}" alt="Avatar" title="Change the avatar">
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
                  <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                  <br />

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <div class="profile_title">
                    <div class="col-md-6">
                      <h2>My Activity Report</h2>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                  </div>
                  <!-- start of user-activity-graph -->
                  <div id="graph_bar" style="width:100%; height:280px;"></div>
                  <!-- end of user-activity-graph -->

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent activity -->
                        <ul class="messages">
                        
                          @if($userProfile['questions'])
                            @foreach ($userProfile['questions'] as $question)

                          <li>
                            <div class="message_date">
                              <h5 class="date text-error">Created On:</h3>
                              <p class="month">{{ $question->getField('createdOn_kqd') }}</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="date text-error">Question:</h3>
                              <blockquote class="message">{{ $question->getField('questionText_kqt') }}.</blockquote>
                              <br />
                              <h5>Question Type:</h3>
                                {{ $question->getField('__kf_QuestionTypeId') }}<br>
                              <h5>  Level:</h3>
                                {{ $question->getField('__kf_LevelId') }}
                              <h5 class="date text-error">  Set:</h3>
                                {{ $question->getField('__kf_SetId') }}
                            </div>
                          </li>

                            @endforeach
                          @endif

                        </ul>
                        <!-- end recent activity -->
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

@stop