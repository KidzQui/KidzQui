<!--
/**
* File: studentlist.blade.php
* Path: resources/views/evaluators/studentlist.php
* Purpose: Displays the list of students who are there under the particular Evaluator
* Created On: 22-03-2017
* Last Modified On: 23-03-2017
* Author: Mohit Dadu, R S DEVI PRASAD
*/
-->

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

    <!-- custom js -->
    <script src="{{ asset('KidzQuiApp/public/js/custom.js') }}"></script>

@stop

@section('content')

    <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="navbar-default">
        <ul class="nav navbar-nav col-md-3">
          <li class="active">
            <a href="{{ URL::to('studentlist') }}"><i class="fa fa-th-list fa-lg" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="{{ URL::to('studentgridlist') }}"><i class="fa fa-th fa-lg" aria-hidden="true"></i></a>
          </li>
        </ul>
        <div class="navbar-right col-md-9">
          <ul class="col-md-4 breadcrumb">
            <li><a href="{{ URL::to('evaluators') }}">Home</a></li>
            <li>Student List</li>
          </ul>
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" id="search" onkeyup="search()" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>List of Students</h2>
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
              <table class="table table-striped projects" id="table">
                <thead>
                  <tr id="header">
                    <th style="width: 10%">Student Id</th>
                    <th style="width: 20%">Student Name</th>
                    <th style="width: 25%">Email Address</th>
                    <th style="width: 15%">Phone Number</th>
                    <th style="width: 15%">Status</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  @if($records)
                    @foreach ($records as $record)

                    <tr>
                      <td>
                        {{ $record->getField('___kp_UserId') }}
                      </td>
                      <td>
                        {{ $record->getField('ct_FullName') }}
                      </td>
                      <td>
                        {{ $record->getField('emailAddress_kqt') }}
                      </td>
                      <td>
                         {{ $record->getField('phoneNumber_kqt') }}
                      </td>
                      <td>
                         {{ $record->getField('isActive_kqt') }}
                      </td>
                      <td>
                        <a href="{{ URL::to('studentdetails', $record->getField('___kp_UserId')) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Profile </a>
                      </td>
                      <td>
                        @if($record->getField('isActive_kqt') === "Active")
                          <form action="editstatus" method="post">
                            <input type="hidden" name="id" value="{{ $record->getRecordId() }}">
                            <input type="hidden" name="status" value="Inactive">
                            <input type="hidden" name="layout" value="User_USR">
                            <input type="hidden" name="page" value="studentlist">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger btn-xs">Deactivate</button>
                          </form>
                        @else
                          <form action="editstatus" method="post">
                            <input type="hidden" name="id" value="{{ $record->getRecordId() }}">
                            <input type="hidden" name="status" value="Active">
                            <input type="hidden" name="layout" value="User_USR">
                            <input type="hidden" name="page" value="studentlist">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-warning btn-xs">Activate</button>
                          </form>
                        @endif
                      </td>
                    </tr>

                    @endforeach
                  @endif

                </tbody>
              </table>
            </div>
            <div class="col-md-12 text-center">
              <ul class="pagination pagination-lg pager" id="myPager"></ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

@stop

@section('footer')

    <!-- custom js -->
    <script src="{{ asset('KidzQuiApp/public/js/custom.js') }}"></script>
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