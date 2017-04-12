<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authors: R S Devi Prasad, Mohit Dadu
// Created On: 22-03-2017

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('evaluatorindex', 'EvaluatorController@index');

    Route::get('evaluators', 'EvaluatorController@home');

    Route::get('studentform', 'EvaluatorController@studentForm');

    Route::post('studentdata', 'EvaluatorController@addStudent');

    Route::get('studentdetails/{record}', 'EvaluatorController@studentDetails');

    Route::get('addtutorials', 'EvaluatorController@addTutorials');

    Route::get('tutorialdetails', 'EvaluatorController@tutorialDetails');

    Route::get('evaluatorlogin', 'EvaluatorController@evaluatorLogin');

    Route::get('addquestions', 'EvaluatorController@addQuestions');

    Route::get('newquestion', 'EvaluatorController@addNewQuestion');

    Route::get('questiondetails', 'EvaluatorController@questionDetails');

    Route::get('profile', 'EvaluatorController@findUser');

    Route::get('studentlist', 'EvaluatorController@studentList');

    Route::get('studentgridlist', 'EvaluatorController@studentGridList');

    Route::post('studentform', 'EvaluatorController@createRecord');

    Route::get('imagedata', 'EvaluatorController@showImage');

    Route::get('questionlist', 'EvaluatorController@questionList');

    Route::post('tutorialdata', 'EvaluatorController@addTutorial');

    Route::post('editdetails', 'EvaluatorController@editRecord');

/* student */

    Route::get('studentprofile', 'StudentController@findUser');

    Route::get('studenthome', 'StudentController@listTutorial');

    Route::get('contact', function () {
        return view('student.contact');
    });

    Route::get('shortcodes', function () {
        return view('student.shortcodes');
    });

    Route::get('singlepage', function () {
        return view('student.singlepage');
    });

    Route::get('staff', function () {
        return view('student.staff');
    });
