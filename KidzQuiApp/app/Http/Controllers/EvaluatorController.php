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
use App\QuestionModel;
use App\Classes\FilemakerWrapper;
use FileMaker;

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
    	return view('evaluators.studentlist', compact('records'));
    }

    public function studentGridList()
    {
        $records = EvaluatorModel::findRecordByType('UsrManagementWeb_USR', '3');
        return view('evaluators.studentgridlist', compact('records'));
    }

    public function addStudent()
    {
        $input = $_POST;
        $returnValue = EvaluatorModel::addUser('User_USR',$input);
        if (returnValue) {
            return redirect('studentlist');
        }

    }

    public function showImage()
    {
        $fm = FilemakerWrapper::getConnection();
        $url = $_GET['-url'];
        if (isset($url)){
            //Show the contents of the container field
            $completeData = $fm->getContainerData($url);
            return response($completeData)->header('Content-Type', 'image/jpeg');
        }
        return 0;
    }

    public function findUser()
    {
    	$userProfile = array(
    		'profile' => EvaluatorModel::findRecordById('User_USR', '2'), 
    		'questions' => QuestionModel::findQuestionByCreaterId('Question_QUS', '2')
    		);
    	return view('evaluators.profile', compact('userProfile'));
    }
}