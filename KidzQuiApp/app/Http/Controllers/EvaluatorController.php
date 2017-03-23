<?php

/**
* File: EvaluatorController.php
* Path: App/Http/Controllers/EvaluatorController.php
* Purpose: Calls the EvaluatorController class to fetch the data from filemaker database
* Date: 23-03-2017
* Author: Mohit Dadu
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EvaluatorModel;
use App\Classes;

class EvaluatorController extends Controller
{
    /*
     * Show all the list of users 
     * @param void
     * @return list of users
     */

    public function index()
    {
        $records = EvaluatorModel::showAllRecords('User_USR');
        return view('test', compact('records'));
    }

    /* 
     * To display the list of students 
     * @param void
     * @return list of student
     */
    public function StudentList()
    {
    	$records = EvaluatorModel::findRecordByType('User_USR', '3');
    	return view('evaluators/studentlist', compact('records'));
    }

}