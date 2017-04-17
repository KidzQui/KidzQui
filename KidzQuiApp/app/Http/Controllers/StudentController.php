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
     * @return userProfile, score, questions answered to Profile page
     */
    public function findUser()
    {
        $fields = array('0' => '___kp_UserId' );
        $student = array('0' => '__kf_StudentId' );
        $scores = array();
        $userProfile = StudentModel::findRecordByField('User_USR', $fields, '3', '1');
        $records = StudentModel::findRecordByField('StudentAnswer_STUANS', $student, '3', '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

        // To create array of scores
        foreach ($records as $record) {
            array_push($scores, $record->getField('studentAnswer_kqn'));
        }

        $count = count($scores);
        $scores = array_count_values($scores);
        $score = isset($scores['1']) ? $scores['1'] : null;
        $score = $score/$count*100;
        // Return to the user profile page
        return view('student.studentprofile', compact('userProfile','records', 'score'));
    }

    /*
     * show tutorials from the database
     * @param void
     * @return tutorials list
     */
    public function listTutorial()
    {
        $tutorials = StudentModel::showAllRecord('Tutorial_TUT');
        //return to student home page
        return view('student.studenthome', compact('tutorials'));
    }

    /*
     * show levels from the database
     * @param void
     * @return number of levels
     */
    public function levels()
    {
        $levels = StudentModel::showAllRecord('Level_LVL');
        //return to student home page
        return view('student.levels', compact('levels'));
    }

    /*
     * show sets from the database
     * @param void
     * @return list of sets according to level
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
     * show list of questions from the database
     * @param $request
     * @return list of questions and choices
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

        $questions = StudentModel::findRecordByField('Question_QusChoice', $fields, $inputs, count($inputs));
        if ($questions) {
            $choices = StudentController::Question($questions);
        } else { $choices = null; }
        return view('student.questions', compact('questions', 'choices'));
    }

    /*
     * calculate choices
     * @param $question
     * @return choice to listquestion function
     */
    public static function Question($questions)
    {
        $choices = array();

        foreach ($questions as $question) {
            $choice = array();
            $related = $question->getRelatedSet('qus_QUSC');

            foreach ($related as $relatedField) {
                array_push($choice, $relatedField->getField('qus_QUSC::choiceValue_kqt'));
            }

            array_push($choices, $choice);
        }

        return $choices;
    }

}
