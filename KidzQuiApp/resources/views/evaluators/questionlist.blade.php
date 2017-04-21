<!--
/**
* File: questionlist.blade.php
* Path: resources/views/evaluators/questionlist.blade.php
* Purpose: The layout to display the list of question
* Created On: 22-03-2017
* Last Modified On: 11-04-2017
* Author: R S DEVI PRASAD, Mohit Dadu
*/
-->
@extends('layouts.app')

@section('title', 'Question List')

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
            <div class="page-title">
              <div class="title_left">
                <h3>Question</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" id="search" onkeyup="search()" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button id="search" class="btn btn-default" type="button">Go!</button>
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

                    <!-- start question list -->
                    <table class="table table-striped projects" id="table">
                      <thead>
                        <tr class="header">
                          <th style="width: 10%">Question Id</th>
                          <th style="width: 30%">Question</th>
                          <th style="width: 20%">Question Type</th>
                          <th style="width: 10%">Set</th>
                          <th style="width: 10%">Level</th>
                          <th style="width: 20%">Created By</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="myTable">

                        @if($listQuestion)
                          @foreach ($listQuestion as $list)

                          <tr>
                            <td>
                              {{ $list->getField('___kp_QuestionId') }}
                            </td>
                            <td>
                              {{ $list->getField('questionText_kqt') }}
                            </td>
                            <td>
                              @php $qusType = $list->getRelatedSet('qus_QUST'); @endphp
                              {{ $qusType[0]->getField('qus_QUST::questionType_kqt') }}
                            </td>
                            <td>
                              @php $set = $list->getRelatedSet('qus_SET'); @endphp
                              {{ $set[0]->getField('qus_SET::setName_kqt') }}
                            </td>
                            <td>
                               {{ $list->getField('__kf_LevelId') }}
                            </td>
                            <td>
                              @php $creator = $list->getRelatedSet('qus_USR'); @endphp
                              {{ $creator[0]->getField('qus_USR::ct_FullName') }}
                            </td>
                            <td>
                              @if($list->getField('isActive_kqt') === "Active")
                                <form action="editstatus" method="post">
                                  <input type="hidden" name="id" value="{{ $list->getRecordId() }}">
                                  <input type="hidden" name="status" value="Inactive">
                                  <input type="hidden" name="layout" value="Question_QUS">
                                  <input type="hidden" name="page" value="questionlist">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-danger">Deactivate</button>
                                </form>
                              @else
                                <form action="editstatus" method="post">
                                  <input type="hidden" name="id" value="{{ $list->getRecordId() }}">
                                  <input type="hidden" name="status" value="Active">
                                  <input type="hidden" name="layout" value="Question_QUS">
                                  <input type="hidden" name="page" value="questionlist">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-success">Activate</button>
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
                  </div
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