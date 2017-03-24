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
    public function studentList()
    {
    	$records = EvaluatorModel::findRecordByType('User_USR', '3');
    	return view('evaluators.studentlist', compact('records'));
    }

    public function addStudent()
    {
        $input = $_POST;
        $returnValue = EvaluatorModel::addUser('User_USR',$input);
        if ($returnValue) {
            return redirect('studentlist');
        }
    }

    /* 
     * To display the list of students into grid
     * @param void
     * @return list of student
     */
    public function studentGridList()
    {
    	$records = EvaluatorModel::findRecordByType('User_USR', '3');
    	return view('evaluators/studentgridlist', compact('records'));
    }

    public function createRecord()
    {
    	$input = Request::all();
    	//EvaluatorModel::addUser($input);
    	return $input;
    	//return view('evaluators/studentform');
    }
}