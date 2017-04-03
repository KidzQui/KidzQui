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
        <div class="">
          <h1>My Profile</h1><hr>
        </div>

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
            <h1>My History</h1><hr>
            <div class="col-md-3 abt-1">
              <h2>Admission tips</h2>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t13.jpg") }}  class="img-responsive zoom-img" alt="">
              </div>
              <ul>
                <li><a href="#">Vestibulum molestie aenean</a></li>
                <li><a href="#">Maecenas tristique lacus</a></li>
                <li><a href="#">Nascetur ridiculus magnis</a></li>
              </ul>
            </div>
            <div class="col-md-3 abt-1">
              <h3>Admission payment</h3>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t12.jpg") }}  class="img-responsive zoom-img" alt="">
              </div>
              <p>Sed laoreet aliquam leo utellus dolor dapibus eget praesent vestibulum molestie.</p>
            </div>
            <div class="col-md-3 abt-1">
              <h3>Admission tests</h3>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t11.jpg") }}  class="img-responsive zoom-img" alt="">
              </div>
              <ul>
                <li><a href="#">Vestibulum molestie aenean</a></li>
                <li><a href="#">Nascetur ridiculus magnis</a></li>
                <li><a href="#">Maecenas tristique lacus</a></li>
              </ul>
            </div>
            <div class="col-md-3 abt-1">
              <h3>Early decision</h3>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t10.jpg") }}  class="img-responsive zoom-img" alt="">
              </div>
              <P>Lacus aenean nonummy hendrerit mauris phasellus porta usce suscipit varius mi. </P>
            </div>
            <div class="clearfix"></div>
          </div>
      </div>
    </div>
  <!--//about-->

  <!--semst-->
    <div class="semst">
      <div class="container">
        <div class="col-md-7 semst-left">
          <h3>Semester's best teachers</h3>
          <ul>
            <li>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t4.jpg" ) }} class="img-responsive zoom-img" alt="">
              </div>
              <p>Lorem ipsum dolor sit amet, consectetu er elit.</p>
            </li>
            <li>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t5.jpg" ) }} class="img-responsive zoom-img" alt="">
              </div>
              <p>Consectetu er adipiscing elit, sed diam nonummy .</p>
            </li>
            <li>
              <div class="history-grid-image">
                <img src={{ asset("KidzQuiApp/resources/assets/images/t6.jpg" ) }} class="img-responsive zoom-img" alt="">
              </div>
              <p>Sed diam nonummy nibh eu ismod tincidunt ut.</p>
            </li>
          </ul>
        </div>
        <div class="col-md-5 semst-right">
          <h3>NewsLetter</h3>
            <form action="#" method="post">
              <input type="text" name="search" value="Enter Your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your email';}">
              <input type="submit" value="Subscribe">
            </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  <!--semst-->

@stop
