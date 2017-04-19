<!--
/**
* File: studentdetails.blade.php
* Path: resources/views/layouts/studentdetails.blade.php
* Purpose: The layout to display the details of particular student
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
            <h3>Student Details</h3>
          </div>

          <div class="title_right">
            <ul class="col-md-9 breadcrumb">
              <li><a href="{{ URL::to('evaluators') }}">Home</a></li>
              <li><a href="{{ URL::to('studentlist') }}">Student List</a></li>
              <li>Student Profile</li>
            </ul>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
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
                  <h3>{{ $records[0]->getField('ct_FullName')}}</h3>

                  <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope-o user-profile-icon"></i> {{ $records[0]->getField('emailAddress_kqt')}}
                    </li>

                    <li>
                      <i class="fa fa-mobile user-profile-icon"></i>  {{ $records[0]->getField('phoneNumber_kqt') }}
                    </li>

                  </ul>

                  <a class="hidden btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                  <br />

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                  <div class="profile_title">
                    <div class="col-md-6">
                      <h2>Result</h2>
                    </div>
                  </div>
                  <!-- start of user-activity-graph -->
                  <canvas id="myChart" width="600" height="300"></canvas>
                  {{-- <div id="graph_bar" style="width:100%; height:280px;"></div> --}}
                  <!-- end of user-activity-graph -->

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Attended Questions</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">My Score</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <!-- start recent activity -->
                          <table class="table table-striped projects">
                            <thead>
                              <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Attended On</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              @if($results)
                                @foreach($results as $result)
                                <tr>
                                  <td>
                                    {{ $result->getField('__kf_QuestionId')}}
                                  </td>
                                  <td>
                                    {{ $result->getField('studentAnswer_kqn') }}
                                  </td>
                                  <td>
                                    {{ $result->getField('answeredOn_kqd') }}
                                  </td>
                                </tr>

                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        <!-- end recent attempt questions -->
                        <div class="col-md-12 text-center">
                          <ul class="pagination pagination-lg pager" id="myPager"></ul>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <div class="message_wrapper">
                              <h4 class="date text-error">Score:</h4>
                              <blockquote class="message">@php echo number_format($score, 2); @endphp %</blockquote>
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
    </div>
    <!-- /page content -->

@stop

@section('footer')

    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>

    <script>

        var gkeys=[];
        var gvals=[];
        var title = 'No. of questions';
        @foreach($scores as $key => $value)
          gkeys.push("{{ $key }}");
          gvals.push("{{ $value }}");
        @endforeach

    </script>

    <script src="{{ asset('KidzQuiApp/public/js/graph.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('KidzQuiApp/public/js/custom.js') }}"></script>
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