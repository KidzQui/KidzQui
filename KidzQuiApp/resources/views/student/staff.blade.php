<!--
/**
* File: staff.blade.php
* Path: resources/views/student/staff.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'staff')

@section('content')

<!--staff-->
  <div class="staff">
    <div class="container">
      <div class="col-md-6 staff-left">
        <h1>Staff Profile</h1>
        <p>consectetuer adipiscin elit praesent vestibulum molestie enean nonummy hendrerit mauris.hendrerit mauris. Phasellus porta. Fusce suscipit varius  Phasellus porta. Fusce suscipit varius micum sociis natoque penatibus et magnis dis.</p>
          <ul>
            <li><a href="#">Vestibulum molestie aenean</a></li>
            <li><a href="#">Nascetur ridiculus magnis</a></li>
            <li><a href="#">Maecenas tristique lacus</a></li>
            <li><a href="#">Nascetur ridiculus magnis</a></li>
          </ul>
      </div>
      <div class="col-md-6 staff-left">
        <h3>The Best Of Professionals</h3>
        <p>consectetuer adipiscin elit praesent vestibulum molestie enean nonummy hendrerit mauris.hendrerit mauris. Phasellus porta. Fusce suscipit varius  Phasellus porta. Fusce suscipit varius micum sociis natoque penatibus et magnis dis.</p>
        <p>consectetuer adipiscin elit praesent vestibulum molestie enean nonummy hendrerit mauris.hendrerit mauris. Phasellus porta. Fusce suscipit varius  Phasellus porta. Fusce suscipit varius micum sociis natoque penatibus et magnis dis.</p>
      </div>
        <div class="clearfix"></div>

    </div>
  </div>
<!--staff-->
<!-- team -->
<div class="team">
  <div class="container">
    <h2>Meet Our Staff</h2>
    <p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus.</p>
    <div class="team-info">
          <div class="col-md-3 team-grids wow fadeInLeft animated" data-wow-delay=".5s">
            <a href="#">
              <img class="img-responsive" src="images/t4.jpg" alt="">
              <div class="captn">
                <h4>Tincidun</h4>
                <p>Aenean pulvinar</p>
                  <ul class="social-icons1">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                  </ul>
              </div>
            </a>
          </div>
          <div class="col-md-3 team-grids animated wow fadeInDown animated" data-wow-duration="1200ms" data-wow-delay="500ms">
            <a href="#">
              <img class="img-responsive" src="images/t5.jpg" alt="">
              <div class="captn">
                <h4>Velit uti</h4>
                <p>Aenean pulvinar</p>
                  <ul class="social-icons1">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                  </ul>
              </div>
            </a>
          </div>
          <div class="col-md-3 team-grids animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms">
            <a href="#">
              <img class="img-responsive" src="images/t6.jpg" alt="">
              <div class="captn">
                <h4>Posuere</h4>
                <p>Aenean pulvinar</p>
                  <ul class="social-icons1">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                  </ul>
              </div>
            </a>
          </div>
          <div class="col-md-3 team-grids wow fadeInRight animated" data-wow-delay=".5s">
            <a href="#">
              <img class="img-responsive" src="images/t7.jpg" alt="">
              <div class="captn">
                <h4>Augc sfe</h4>
                <p>Aenean pulvinar</p>
                  <ul class="social-icons1">
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-twitter"></i></li>
                    <li><i class="fa fa-linkedin"></i></li>
                  </ul>
              </div>
            </a>
          </div>
          <div class="clearfix"> </div>
        </div>

  </div>
</div>
<!-- team -->

@stop
