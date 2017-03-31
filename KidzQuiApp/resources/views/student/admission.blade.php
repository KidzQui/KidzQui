<!--
/**
* File: admission.blade.php
* Path: resources/views/student/admission.blade.php
* Purpose: The base layout for the display of student app
* Created On: 30-03-2017
* Last Modified On: 30-03-2017
* Author: MOHIT DADU
*/
-->

@extends('layouts.student')

@section('title', 'admission')

@section('content')

<!--about-->
    <div class="about">
        <div class="container">
            <h1>About Admission</h1>
            <div class="col-md-4 about-left">
                <div class="history-grid-image">
                        <img src="images/n3.jpg" class="img-responsive zoom-img" alt="">
                    </div>
            </div>
            <div class="col-md-8 about-right">
                <h4>Consectetue adipiscing elit raesent vestibulum</h4>
                <p>Sed laoreet aliquam leo utellus dolor dapibus eget praesent vestibulum molestie lacus aenean nonummy hendrerit mauris phasellus porta usce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui fusce feugiat male-suadam odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. </p>
                <p>Vestibulum molestie lacus aenean nonummy oque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui fusce feugiat male-suadam odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. </p>
            </div>
                <div class="clearfix"></div>
            <div class="about-top">
                <div class="col-md-3 abt-1">
                    <h2>Admission tips</h2>
                    <div class="history-grid-image">
                        <img src="images/t13.jpg" class="img-responsive zoom-img" alt="">
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
                        <img src="images/t12.jpg" class="img-responsive zoom-img" alt="">
                    </div>
                    <p>Sed laoreet aliquam leo utellus dolor dapibus eget praesent vestibulum molestie.</p>
                </div>
                <div class="col-md-3 abt-1">
                    <h3>Admission tests</h3>
                    <div class="history-grid-image">
                        <img src="images/t11.jpg" class="img-responsive zoom-img" alt="">
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
                        <img src="images/t10.jpg" class="img-responsive zoom-img" alt="">
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
                    <li><div class="history-grid-image">
                        <img src="images/t4.jpg" class="img-responsive zoom-img" alt="">
                    </div>
                        <p>Lorem ipsum dolor sit amet, consectetu er elit.</p></li>
                    <li><div class="history-grid-image">
                        <img src="images/t5.jpg" class="img-responsive zoom-img" alt="">
                    </div>
                        <p>Consectetu er adipiscing elit, sed diam nonummy .</p></li>
                    <li><div class="history-grid-image">
                        <img src="images/t6.jpg" class="img-responsive zoom-img" alt="">
                    </div>
                        <p>Sed diam nonummy nibh eu ismod tincidunt ut.</p></li>
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
