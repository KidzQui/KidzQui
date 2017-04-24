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
use Mail;

class EvaluatorController extends Controller
{
    // Constructor for authentication
    function __construct()
    {
        $this->middleware('evaluator', ['except' => ['index', 'evaluatorLogin']]);
    }

    /*
     * find the user details and create session
     * @param request object - $request
     * @return list of users
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required|min:4'
        ]);

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

        // To find the total number of students.
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

        // To find the student details
        $records = EvaluatorModel::findRecordByField('UsrManagementWeb_USR', '___kp_UserId', $record);
        // To find the answers given by student
        $results = StudentModel::findRecordByField('StuAns_STUANS', $student, $record, '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

        // // To find the answer given by students
        if ($results) {
            foreach ($results as $result) {
                array_push($scores, $result->getField('studentAnswer_kqn'));
            }

            // To calculate the score of student
            $count = count($scores);
            $scores = array_count_values($scores);
            $score = isset($scores['1']) ? $scores['1'] : null;
            $score = $score/$count*100;
        } else {
            $scores = 0;
            $score = 0;
        }
        $medFile = urlencode(EvaluatorController::findMedia($records[0]->getField('__kf_MediaId')));
        return view('evaluators.studentdetails', compact('records', 'results', 'scores', 'score', 'medFile'));
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
     * @param request object
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

        $fields = array('0', 'firstName_kqt',
                        '1', 'lastName_kqt',
                        '2', 'emailAddress_kqt',
                        '3', 'phoneNumber_kqt',
                        '4', 'createdBy_kqn',
                        '5', '__kf_UserTypeId',
                        '6', 'isActive_kqt');

        $values = array('0' => $request['firstname'],
                        '1' => $request['lastname'],
                        '2' => $request['emailaddress'],
                        '3' => $request['phonenumber'],
                        '4' => $request['creatorId'],
                        '5' => '3',
                        '6' => 'Active');

        $returnValue = EvaluatorModel::addUser('User_USR', $fields, $values, count($fields), $request->all());

        if ($returnValue) {
            return EvaluatorController::sendMail($request->emailaddress);
        }

        return back();
    }

    /*
     * To edit profile details into database
     * @param request object
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

        $fields = array(
            0 => 'firstName_kqt',
            1 => 'lastName_kqt',
            2 => 'emailAddress_kqt',
            3 => 'phoneNumber_kqt'
        );

        $inputs = array(
            0 => $request->get('firstname'),
            1 => $request->get('lastname'),
            2 => $request->get('emailaddress'),
            3 => $request->get('phonenumber'),
            'recordid' => $request->get('recordid')
        );

        $returnValue = EvaluatorModel::editRecord('User_USR', $inputs, $fields, count($fields));

        if ($returnValue) {
            $request->session()->put('name', $request->get('firstname'));
            return redirect('profile');
        }

        return back();
    }

    /*
     * To update the status of the question or student
     * @param request object
     * @return void
     */
    public function changeStatus(Request $request)
    {
        $inputs = array(
             0 => $request->status,
             'recordid' => $request->id
        );

        $fields = array(
            0 => 'isActive_kqt',
        );

        $returnValue = EvaluatorModel::editRecord($request->layout, $inputs, $fields, count($fields));

        if ($returnValue) {
            return redirect($request->page);
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

        // To check the image extension
        if ($url == "jpg") {
            header('Content-type: image/jpeg');
        } elseif ($url == "gif") {
            header('Content-type: image/gif');
        } else {
            header('Content-type: application/octet-stream');
        }

        echo $fm->getContainerData($request['url']);
    }

    /*
     * show Evaluator details from the database
     * @param request object
     * @return userProfile to Profile page
     */
    public function findUser(Request $request)
    {
        $userProfile = array(

        // To get the profile details
          'profile' => EvaluatorModel::findRecordByField('User_USR', '___kp_UserId', $request->session()->get('users')),

        // To get all questions added by the Evaluator
          'questions' => EvaluatorModel::findRecordByField('QuestionDisplay_QUS', 'createdBy_kqn', $request->session()->get('users'), 'createdOn_kqd', FILEMAKER_SORT_DESCEND),

        // To get all tutorials added by the Evaluator
          'tutorials' => EvaluatorModel::findRecordByField('Tutorial_TUT', 'createdBy_kqn', $request->session()->get('users'), 'createdOn_kqd', FILEMAKER_SORT_DESCEND)

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
        $listQuestion = QuestionModel::showAllQuestion('QuestionDisplay_QUS');
        return view('evaluators.questionlist', compact('listQuestion'));
    }

    /*
     * Add a new question to the database by the evaluator
     * @param request object
     * @return void
     */
    public function addNewQuestion(Request $request)
    {
        // To validate the details
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
     * @param request object
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
     * Show list of tutorials from database
     * @param void
     * @return list of tutorials
     */
    public function tutorialList()
    {
        $listTutorial = EvaluatorModel::showAllRecord('TutorialDetails_TUT');
        return view('evaluators.tutoriallist', compact('listTutorial'));
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
     * To destroy the session of the user and logout them out
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

    /*
     * To send mail to the user (student) after they are created
     * @param email of student
     * @return void
     */
    public static function sendMail($email)
    {
        $dataEmail = array(
            'name' => 'Kids',
            'email' => $email,
            'content' => 'Please login to <a href="http://localhost/KidzQui/">KidzQui</a> and start your course.
                          Happy Mathematics solving.'
        );

        Mail::send('email.test', $dataEmail, function ($message) use ($dataEmail) {
            $message->to($dataEmail['email']);
            $message->subject('Hello Email');
        });

        return redirect('studentlist');
    }
}
