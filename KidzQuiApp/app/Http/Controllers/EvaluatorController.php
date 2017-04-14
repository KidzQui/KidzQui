<?php

/**
* File: EvaluatorController.php
* Path: App/Http/Controllers/EvaluatorController.php
* Purpose: Calls the EvaluatorController class to fetch the data from filemaker database
* Date: 23-03-2017
* Authors: Mohit Dadu, R S DEVI PRASAD
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EvaluatorModel;
use App\StudentModel;
use App\QuestionModel;
use App\Classes\FilemakerWrapper;
use FileMaker;
use Validator;

class EvaluatorController extends Controller
{
    function __construct()
    {
        $this->middleware('evaluator', ['except' => ['index', 'evaluatorLogin']]);
    }

    /*
     * Show all the list of users
     * @param request object - $request
     * @return list of users
     */
    public function index(Request $request)
    {
        $isUser = EvaluatorModel::userDetails('User_USR', $request->all());
        // to check if the record found
        if ($isUser) {
            session(['users' => $isUser[0]->getField('___kp_UserId')]);
            $request->session()->put('name', $isUser[0]->getField('firstName_kqt'));
            $request->session()->put('type', $isUser[0]->getField('__kf_UserTypeId'));
            $request->session()->put('mediaId', urlencode(EvaluatorController::findMedia($isUser[0]->getField('__kf_MediaId'))));
            return redirect('evaluators');
        }

        return back();
    }

    /*
     * To create the session for login
     * @param void
     * @return data to index app
     */
    public function home()
    {
        $records = EvaluatorModel::findRecordByField('User_USR', '__kf_UserTypeId', '3');
        $results = array();

        // To create array of student created dates
        foreach ($records as $record) {
            array_push($results, $record->getField('createdOn_kqd'));
        }

        // To find th total number of students.
        $totalStudents = EvaluatorModel::showAllRecord('User_USR');

        // To find student added by particular user
        $myStudents = EvaluatorModel::findRecordByField('User_USR', 'createdBy_kqn', '2');

        // To find number of questions
        $totalQuestions = EvaluatorModel::showAllRecord('Question_QUS');

        // To find number of tutorials
        $totalTutorials = EvaluatorModel::showAllRecord('Tutorial_TUT');

        // to display recentle added student
        $sortRecord = EvaluatorModel::findRecordByField('User_USR', '__kf_UserTypeId', '3', 'createdOn_kqd', FILEMAKER_SORT_DESCEND);

        // Return to the evaluator dashboard
        return view('evaluators.index', compact('results', 'totalStudents', 'myStudents', 'totalQuestions', 'totalTutorials', 'sortRecord'));
    }

    /*
     * To display the list of students in list view
     * @param void
     * @return list of student
     */
    public function studentList()
    {
        $records = EvaluatorModel::findRecordByField('User_USR', '__kf_UserTypeId', '3');
        return view('evaluators.studentlist', compact('records'));
    }

    /*
     * To get particular student details
     * @param $record (number)
     * @return record details
     */
    public function studentDetails($record)
    {
        $scores = array();
        $student = array('0' => '__kf_StudentId' );

        $records = EvaluatorModel::findRecordByField('UsrManagementWeb_USR', '___kp_UserId', $record);
        $results = StudentModel::findRecordByField('StudentAnswer_STUANS', $student, $record, '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

        // // To create array of scores
        foreach ($results as $result) {
            array_push($scores, $result->getField('studentAnswer_kqn'));
        }

        $count = count($scores);
        $scores = array_count_values($scores);
        $score = isset($scores['1']) ? $scores['1'] : null;
        $score = $score/$count*100;
        return view('evaluators.studentdetails', compact('records','results','scores', 'score'));
    }

    /*
     * To display the list of students in grid view
     * @param void
     * @return list of student
     */
    public function studentGridList()
    {
        $records = EvaluatorModel::findRecordByField('UsrManagementWeb_USR', '__kf_UserTypeId', '3');
        return view('evaluators.studentgridlist', compact('records'));
    }

    /*
     * To create the session for login
     * @param void
     * @return void
     */
    public function studentForm()
    {
        return view('evaluators.studentform');
    }

    /*
     * Add new student to the database
     * @param void
     * @return void
     */
    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'emailaddress' => 'required|email',
            'phonenumber' => 'required|digits:10'
        ]);

        $returnValue = EvaluatorModel::addUser('User_USR', $request->all());
        if ($returnValue) {
            return redirect('studentlist');
        }

        return back();
    }

    /*
     * To edit profile details into database
     * @param void
     * @return void
     */
    public function editRecord(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'emailaddress' => 'required|email',
            'phonenumber' => 'required|digits:10'
        ]);

        $returnValue = EvaluatorModel::editRecord('User_USR', $request->all());
        if ($returnValue) {
            $request->session()->put('name', $request->get('firstname'));
            return redirect('profile');
        }

        return back();
    }

    /*
     * show image on web
     * @param $request
     * @return image url fetched from database
     */
    public function showImage(Request $request)
    {
        $url = $request['url'];

        $fm = FilemakerWrapper::getConnection();
        $url = substr($url, 0, strpos($url, "?"));
        $url = substr($url, strrpos($url, ".") + 1);

        if($url == "jpg"){
            header('Content-type: image/jpeg');
        }
        else if($url == "gif"){
            header('Content-type: image/gif');
        }
        else{
            header('Content-type: application/octet-stream');
        }
        echo $fm->getContainerData($request['url']);
    }

    /*
     * show Evaluator details from the database
     * @param void
     * @return userProfile to Profile page
     */
    public function findUser(Request $request)
    {
        $userProfile = array(

        // To get the profile details
          'profile' => EvaluatorModel::findRecordByField('User_USR', '___kp_UserId', $request->session()->get('users')),

        // To get all questions added by the Evaluator
          'questions' => EvaluatorModel::findRecordByField('Question_QUS', 'createdBy_kqn',  $request->session()->get('users'), 'createdOn_kqd', FILEMAKER_SORT_DESCEND),

        // To get all tutorials added by the Evaluator
          'tutorials' => EvaluatorModel::findRecordByField('Tutorial_TUT', 'createdBy_kqn',  $request->session()->get('users'), 'createdOn_kqd', FILEMAKER_SORT_DESCEND)

        );

        // Return to the user profile page
        return view('evaluators.profile', compact('userProfile'));
    }

    /*
     * Show list of questions from database
     * @param void
     * @return list of questions
     */
    public function questionList()
    {
        $listQuestion = QuestionModel::showAllQuestion('Question_QUS');
        return view('evaluators.questionlist', compact('listQuestion'));
    }

    /*
     * Add a new question to the database by the evaluator
     * @param $request
     * @return void
     */
    public function addNewQuestion(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'radio' => 'required',
            'set' => 'required',
            'level' => 'required',
            'answer' => 'required'
        ]);

        $isAdded = QuestionModel::addQuestion('Question_QUS', $request->all());

        if ($isAdded == 1) {
            return redirect('questionlist');
        }

        return $isAdded;
    }

    /*
     * To redirect to the add question page
     * @param void
     * @return void
     */
    public function addQuestions()
    {
        return view('evaluators.addquestions');
    }

    /*
     * To redirect to the question details page
     * @param void
     * @return void
     */
    public function questionDetails()
    {
        return view('evaluators.questiondetails');
    }

    /*
     * To redirect to the add tuutorial page
     * @param void
     * @return void
     */
    public function addTutorials()
    {
        return view('evaluators.addtutorials');
    }

    /*
     * To add new tutorial into database
     * @param $request
     * @return void
     */
    public function addTutorial(Request $request)
    {
        $inputs = array(
            0 => $request['title'],
            1 => $request['description'],
            2 => $request->session()->get('users')
        );
        $fields = array(
            0 => 'tutorialTitle_kqt',
            1 => 'tutorialDescription_kqt',
            2 => 'createdBy_kqn'
        );
        $retValue = EvaluatorModel::createRecord('Tutorial_TUT', $inputs, $fields, count($inputs));
        if ($retValue) {
            return redirect('tutorialdetails');
        }
        return back();
    }

    /*
     * To redirect to the tutorial details page
     * @param void
     * @return void
     */
    public function tutorialDetails()
    {
        return view('evaluators.tutorialdetails');
    }

    /*
     * To check the session status and destroy
     * @param $request
     * @return session data to login app
     */
    public function evaluatorLogin(Request $request)
    {
        $request->session()->flush();
        return view('evaluators.login');
    }

    /*
     * To find the media file from database
     * @param $id (number)
     * @return media file
     */
    public static function findMedia($id)
    {
        $medRecord = EvaluatorModel::findRecordByField('Media_MED', '___kp_MediaId', $id);
        return $medRecord[0]->getField('mediaFile_kqr');
    }

}