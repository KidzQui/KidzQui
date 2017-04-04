@extends('layouts.app')

@section('title', 'Student List')

@section('header')

    <!-- Bootstrap -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

@stop

@section('content')

  <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="navbar-default">
          <ul class="nav navbar-nav col-md-3">
            <li>
              <a href="{{ URL::to('studentlist') }}"><i class="fa fa-th-list fa-lg" aria-hidden="true"></i></a>
            </li>
            <li class="active">
              <a href="{{ URL::to('studentgridlist') }}"><i class="fa fa-th fa-lg" aria-hidden="true"></i></a>
            </li>
          </ul>
          <div class="navbar-right col-md-9">
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
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <div class="clearfix"></div>

                  @if($records)
                    @foreach ($records as $record)

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>{{ $record->getField('___kp_UserId') }}</i></h4>
                          <div class="left col-xs-7">
                            <h2>{{ $record->getField('ct_FullName') }}</h2>
                            <p><strong>Personal details: </strong> </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-building"></i>Email Address: {{ $record->getField('emailAddress_kqt') }}</li>
                              <li><i class="fa fa-phone"></i> Phone: {{ $record->getField('phoneNumber_kqt') }} </li>
                              <li><i class="fa fa-phone"></i> Status: {{ $record->getField('isActive_kqt') }} </li>
                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/img.jpg') }}" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                              </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs">
                              <i class="fa fa-user"> </i> View Profile
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    @endforeach
                  @endif

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
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/js/custom.min.js') }}"></script>

@stop