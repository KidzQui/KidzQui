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
        $fields = array('0' => '___kp_UserId' );
        $student = array('0' => '__kf_StudentId' );
        $scores = array();
        $userProfile = StudentModel::findRecordByField('User_USR', $fields, '3', '1');
        $records = StudentModel::findRecordByField('StudentAnswer_STUANS', $student, '3', '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

        // // To create array of scores
        foreach ($records as $record) {
            array_push($scores, $record->getField('studentAnswer_kqn'));
        }

        $count = count($scores);
        $scores = array_count_values($scores);
        $score = isset($scores['1']) ? $scores['1'] : null;
        $score = $score/$count*100;
        // // Return to the user profile page
        return view('student.studentprofile', compact('userProfile','records', 'score'));
    }

    /*
     * show Evaluator details from the database
     * @param void
     * @return userProfile to Profile page
     */
    public function listTutorial()
    {
        $tutorials = StudentModel::showAllRecord('Tutorial_TUT');
        $levels = StudentModel::showAllRecord('Level_LVL');
        //return to student home page
        return view('student.studenthome', compact('tutorials', 'levels'));
    }

    /*
     * show Evaluator details from the database
     * @param void
     * @return userProfile to Profile page
     */
    public function listSets(Request $request)
    {
        $fields = array('0' => '__kf_LevelId' );
        $level = $request['levelid'];
        $sets = StudentModel::findRecordByField('Set_SET', $fields, $level, '1');
        $questionTypes = StudentModel::showAllRecord('QuestionType_QUST');
        return view('student.sets', compact('sets', 'questionTypes', 'sets', 'level'));
    }

    /*
     * show Evaluator details from the database
     * @param void
     * @return userProfile to Profile page
     */
    public function listQuestions(Request $request)
    {
        $fields = array(
            '0' => '__kf_LevelId',
            '1' => '__kf_SetId',
            '2' => '__kf_QuestionTypeId'
        );
        $inputs = array(
            '0' => $request['level'],
            '1' => $request['set'],
            '2' => $request['questiontype']
        );
        $questions = StudentModel::findRecordByField('Question_QUS', $fields, $inputs, count($inputs));

        return view('student.questions', compact('questions'));
    }

}
