<!--
/**
* File: tutorialdetails.blade.php
* Path: resources/views/evaluators/tutorialdetails.blade.php
* Purpose: The layout to display the details of particular tutorial
* Created On: 22-03-2017
* Last Modified On: 11-04-2017
* Author: R S DEVI PRASAD, Mohit Dadu
*/
-->


@extends('layouts.app')

@section('title', 'Tutorial Details')

@section('header')

    <!-- Bootstrap -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

@stop

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Contacts Design</h3>
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
          <div class="x_panel">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/user.png') }}" alt="" class="img-circle img-responsive">
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/user.png') }}" alt="" class="img-circle img-responsive">
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/user.png') }}" alt="" class="img-circle img-responsive">
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/user.png') }}" alt="" class="img-circle img-responsive">
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

                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                  <div class="well profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>Digital Strategist</i></h4>
                      <div class="left col-xs-7">
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Address: </li>
                          <li><i class="fa fa-phone"></i> Phone #: </li>
                        </ul>
                      </div>
                      <div class="right col-xs-5 text-center">
                        <img src="{{ asset('KidzQuiApp/public/bower_components/gentelella/production/images/user.png') }}" alt="" class="img-circle img-responsive">
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

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('KidzQuiApp/public/bower_components/gentelella/build/js/custom.min.js') }}"></script>

@stop