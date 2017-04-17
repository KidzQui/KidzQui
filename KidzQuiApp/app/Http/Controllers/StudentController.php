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
    function __construct()
    {
        $this->middleware('student', ['except' => ['index', 'studentLogin']]);
    }

    /*
     * find the student from the list of users
     * @param request object - $request
     * @return student
     */
    public function index(Request $request)
    {
        $isUser = StudentModel::userDetails('User_USR', $request->all());
        // to check if the record found
        if ($isUser) {
            session(['users' => $isUser[0]->getField('___kp_UserId')]);
            $request->session()->put('name', $isUser[0]->getField('firstName_kqt'));
            $request->session()->put('type', $isUser[0]->getField('__kf_UserTypeId'));
            // $request->session()->put('mediaId', urlencode(StudentController::findMedia($isUser[0]->getField('__kf_MediaId'))));
            return redirect('studenthome');
        }

        return back();
    }

    /*
     * Find student details
     * @param void
     * @return userProfile, score, questions answered to Profile page
     */
    public function findUser(Request $request)
    {
        $fields = array('0' => '___kp_UserId' );
        $student = array('0' => '__kf_StudentId' );

        // To get the profile details
        $scores = array();
        $userProfile = StudentModel::findRecordByField('User_USR', $fields, $request->session()->get('users'), '1');

        $records = StudentModel::findRecordByField('StudentAnswer_STUANS', $student, $request->session()->get('users'), '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

        // To create array of answers given by student
        foreach ($records as $record) {
            array_push($scores, $record->getField('studentAnswer_kqn'));
        }

        // to find the score gained by student
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

        // To check for available choices.
        if ($questions) {
            $choices = StudentController::Question($questions);
        } else { $choices = null; }

        return view('student.questions', compact('questions', 'choices'));
    }

    /*
     * Find the choices related to the questions
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

    /*
    * To store the answer given by the student(s)
    * @param $requests
    * @return void
    */
    public function studentAnswer(Request $request)
    {
        $request->get()->all();
        dd($request);
    }

    /*
     * To check the session status and destroy
     * @param $request
     * @return session data to login app
     */
    public function studentLogin(Request $request)
    {
        $request->session()->flush();
        return view('student.studentlogin');
    }
}
