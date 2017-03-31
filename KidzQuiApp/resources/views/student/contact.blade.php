<!--
/**
* File: contact.blade.php
* Path: resources/views/student/contact.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'contact')

@section('content')

<!--contact-->
<div class="contact">
  <div class="container">
    <div class="contact-top heading">
      <h1>Contact</h1>
    </div>
    <div class="contact-text">
      <div class="col-md-3 contact-left">
        <div class="address">
          <h2>Address</h2>
          <p>The company name,
          <span>Lorem ipsum dolor,</span>
          Glasglow Dr 40 Fe 72.</p>
        </div>
        <div class="address">
          <h5>Address1</h5>
          <p>Tel:1115550001,
          <span>Fax:190-4509-494</span>
          Email: <a href="mailto:example@email.com">contact@example.com</a></p>
        </div>
      </div>
      <div class="col-md-9 contact-right">
        <form action="#" method="post">
          <input type="text" name="name" placeholder="Name">
          <input type="text" name="phone "placeholder="Phone">
          <input type="text" name="email" placeholder="Email">
          <textarea placeholder="Message" name="message" required=""></textarea>
          <div class="submit-btn">
            <input type="submit" value="SUBMIT">
          </div>
        </form>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--contact-->

@stop
