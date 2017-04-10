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
     * @param $request
     * @return session data to index app
     */
    public function home()
    {
        return view('evaluators.index');
    }

    /*
     * To display the list of students in list view
     * @param void
     * @return list of student
     */
    public function studentList()
    {
        $records = EvaluatorModel::findRecordByType('User_USR', '3');
        return view('evaluators.studentlist', compact('records'));
    }

    /*
     * To create the session for login
     * @param $request
     * @return session data student details app
     */
    public function studentDetails()
    {
        return view('evaluators.studentdetails');
    }

    /*
     * To display the list of students in grid view
     * @param void
     * @return list of student
     */
    public function studentGridList()
    {
        $records = EvaluatorModel::findRecordByType('UsrManagementWeb_USR', '3');
        return view('evaluators.studentgridlist', compact('records'));
    }

    /*
     * To create the session for login
     * @param $request
     * @return session data to student form app
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
     * show image on web
     * @param void
     * @return void
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
    public function findUser()
    {
        $userProfile = array(
        // To get the profile details
          'profile' => EvaluatorModel::findRecordById('User_USR', '2', '___kp_UserId'),

        // To get all questions added by the Evaluator
          'questions' => QuestionModel::findQuestionByCreaterId('Question_QUS', '2')
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
     * @param post data of the form
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
     * To check the session status
     * @param $request
     * @return session data to addquestions app
     */
    public function addQuestions()
    {
        return view('evaluators.addquestions');
    }

    /*
     * To check the session status
     * @param $request
     * @return session data to question details app
     */
    public function questionDetails()
    {
        return view('evaluators.questiondetails');
    }

    /*
     * To check the session status
     * @param $request
     * @return session data to addtutorial app
     */
    public function addTutorials()
    {
        return view('evaluators.addtutorials');
    }

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
     * To check the session status
     * @param $request
     * @return session data to tutorial details app
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

    public static function findMedia($id)
    {
        $medRecord = EvaluatorModel::findRecordById('Media_MED', $id, '___kp_MediaId');
        return $medRecord[0]->getField('mediaFile_kqr');
    }

}