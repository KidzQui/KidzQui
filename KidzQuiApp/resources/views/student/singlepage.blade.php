<!--
/**
* File: singlepage.blade.php
* Path: resources/views/student/singlepage.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'singlepage')

@section('header')

  <link href={{ URL::asset("KidzQuiApp/resources/assets/css/font-awesome.min.css") }} rel="stylesheet" type="text/css" media="all" />

@stop

@section('content')

<!--single-page-->
<div class="single">
  <div class="container">
    <div class="single-page-artical">
      <div class="artical-content">
        <h1>Lorem Ipsum is simply dummy text</h1>
        <img class="img-responsive" src="images/22.jpg" alt=" " style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <div class="artical-links">
        <ul>
          <li><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><span>March 10, 2016</span></li>
          <li><a href="#"><i class="glyphicon glyphicon-user" aria-hidden="true"></i><span>admin</span></a></li>
          <li><a href="#"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><span>No comments</span></a></li>
          <li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i><span>View posts</span></a></li>
        </ul>
      </div>
      <div class="comment-grid-top">
        <h2>Responses</h2>
        <div class="comments-top-top">
          <div class="top-comment-left">
            <a href="#"><img class="img-responsive" src="images/55.jpg" alt=""></a>
          </div>
          <div class="top-comment-right">
            <ul>
              <li><span class="left-at"><a href="#">Admin</a></span></li>
              <li><span class="right-at">March 10, 2016 at 10.30am</span></li>
              <li><a class="reply" href="#">Reply</a></li>
            </ul>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum .
            </p>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="comments-top-top top-grid-comment">
          <div class="top-comment-left">
            <a href="#"><img class="img-responsive" src="images/56.jpg" alt=""></a>
          </div>
          <div class="top-comment-right">
            <ul>
              <li><span class="left-at"><a href="#">Admin</a></span></li>
              <li><span class="right-at">March 18, 2016 at 10.30am</span></li>
              <li><a class="reply" href="#">Reply</a></li>
            </ul>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum . </p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="artical-commentbox">
        <h3>leave a comment</h3>
        <div class="table-form">
          <form action="#" method="post">
            <input placeholder="Name" name="name" type="text" required="">
            <input placeholder="Email" name="email" type="email" required="">
            <input placeholder="Phone" name="phone" type="text" required="">
            <textarea placeholder="Message" name="message" ></textarea>
            <input type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--single-page-->

@stop
