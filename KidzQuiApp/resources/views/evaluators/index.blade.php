<!--
/**
* File: index.blade.php
* Path: resources/views/evaluators/index.blade.php
* Purpose: The layout to display the graph and top profile on evaluator dashboard
* Created On: 22-03-2017
* Last Modified On: 11-04-2017
* Author: R S DEVI PRASAD, Mohit Dadu
*/
-->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')

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
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{ $totalStudents[0]->getField('cn_TotalStudents') }}</div>
                  <h3>Total Students</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count">{{ count($myStudents) }}</div>
                  <h3>My Students</h3>
                </div>
              </div><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-question-circle"></i></div>
                  <div class="count">{{ count($totalQuestions) }}</div>
                  <h3>Total Questions</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count">{{ count($totalTutorials) }}</div>
                  <h3>Total Tutorials</h3>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Added Summary<small>Per Day </small></h2>
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
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="max-height:280px">
                        <canvas id="myChart" width="600" height="290"></canvas>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                        <div class="x_title">
                          <h2>Recently Added Students</h2>
                          <div class="clearfix"></div>
                        </div>

                        <ul class="list-unstyled top_profiles scroll-view">
                        <?php $i=1; ?>
                        @foreach($sortRecord as $record)
                          @if($i < 9)
                          <li class="media event">
                              <h5>{{ $record->getField('ct_FullName') }}</h5>
                          </li>
                          <?php $i = $i+1; ?>
                          @endif
                          @endforeach
                        </ul>

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

    <!-- Chart.js -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>

    <script>

      @php
        $records = array_count_values($results);
      @endphp

        var gkeys=[];
        var gvals=[];
        var title = 'No. Of Students';
        @foreach($records as $key => $value)
          gkeys.push("{{ $key }}");
          gvals.push("{{ $value }}");
        @endforeach

    </script>

    <script src="{{ asset('KidzQuiApp/public/js/graph.js') }}"></script>
    <!-- end chart -->

    <!-- Bootstrap -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/js/custom.js') }}"></script>
@stop