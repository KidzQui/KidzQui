<?php

/**
* File: StudentController.php
* Path: App/Http/Controllers/StudentController.php
* Purpose: Calls the StudentController class to fetch the data from filemaker database
* Date: 22-03-2017
* Author: Mohit Dadu
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\StudentModel;
use App\Classes\FilemakerWrapper;
use FileMaker;

class StudentController extends Controller
{
    /*
     * Show all the list of users in the database
     * @param void
     * @return list of users
     */
    public function index()
    {
        //
    }

    /*
     * show Evaluator details from the database
     * @param void
     * @return userProfile to Profile page
     */
    public function findUser()
    {
        $userProfile = StudentModel::findRecordById('User_USR', '3');
        // Return to the user profile page
        return view('student.studentprofile', compact('userProfile'));
    }

    public function listTutorial()
    {
        $records = StudentModel::showAllRecord('Tutorial_TUT');
        //return to student home page
        return view('student.studenthome', compact('records'));
    }
}
