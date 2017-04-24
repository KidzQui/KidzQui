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
    // constructor for authentication
    function __construct()
    {
        $this->middleware('student', ['except' => ['index', 'studentLogin']]);
    }

    /*
     * find the student from the list of users and create session
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
            $request->session()->put('mediaId', urlencode(StudentController::findMedia($isUser[0]->getField('__kf_MediaId'))));
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
        $records = StudentModel::findRecordByField('StuAns_STUANS', $student, $request->session()->get('users'), '1', 'answeredOn_kqd', FILEMAKER_SORT_DESCEND);

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
        return view('student.studentprofile', compact('userProfile', 'records', 'score'));
    }

    /*
     * show tutorials from the database
     * @param void
     * @return tutorials list
     */
    public function listTutorial()
    {
        $tutorials = StudentModel::showAllRecord('Tutorial_TUT');

        // Return to student home page
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
    public function listSets($level)
    {
        session()->put('level', $level);
        $fields = array('__kf_LevelId' );

        $sets = StudentModel::findRecordByField('Set_SET', $fields, $level, count($fields));
        $questionTypes = StudentModel::showAllRecord('QuestionType_QUST');
        return view('student.sets', compact('sets', 'questionTypes'));
    }

    /*
     * show list of questions from the database
     * @param $request
     * @return list of questions and choices
     */
    public function listQuestions($set, Request $request)
    {
        session()->put('set', $set);

        $fields = array(
            '0' => '__kf_LevelId',
            '1' => '__kf_SetId',
            '2' => '__kf_QuestionTypeId'
        );

        $inputs = array(
            '0' => session()->get('level'),
            '1' => session()->get('set'),
            '2' => $request['questiontype']
        );

        $questions = StudentModel::findRecordByField('Question_QusChoice', $fields, $inputs, count($inputs));

        // To check for available choices.
        if ($questions) {
            $choices = StudentController::question($questions);
        } else {
            $choices = null;
        }

        return view('student.questions', compact('questions', 'choices'));
    }

    /*
     * Find the choices related to the questions
     * @param $question
     * @return choice to listquestion function
     */
    public static function question($questions)
    {
        $choices = array();
        $answer = array();

        // To find the related records from question layout
        foreach ($questions as $question) {
            $choice = array();
            $related = $question->getRelatedSet('qus_QUSC');

            foreach ($related as $relatedField) {
                // To find and create array of correct answers
                if ($relatedField->getField('qus_QUSC::isCorrect_kqn')) {
                    array_push($answer, $relatedField->getField('qus_QUSC::choiceValue_kqt'));
                }

                // To create the array of choices of a question
                array_push($choice, $relatedField->getField('qus_QUSC::choiceValue_kqt'));
            }

            // To create array of choices of all questions
            array_push($choices, $choice);
        }

        // return array of choices and answers of questions
        return array($choices, $answer);
    } // end Question

    /*
    * To store the answer given by the student(s)
    * @param $requests
    * @return void
    */
    public function studentAnswer(Request $request)
    {
        $setId = session()->get('set');
        $levelId = session()->get('level');
        $studentId = session()->get('users');
        $input = $request->all();
        $matches = array();
        $score = 0;

        // extract number from string
        foreach ($input as $key => $value) {
            if (preg_match_all('!\d+!', $key, $match)) {
                $data = implode('', $match[0]);
                array_push($matches, $data);
            }
        }

        $matches = array_count_values($matches);
        foreach ($matches as $key => $value) {
            $questionId = $input['question'.$key];

            // Check for correct answer and calculate score
            if ($input['choice'.$key] == $input['answer'.$key]) {
                $answer = '1';
                $score += 1;
            } else {
                $answer = '0';
            }

            $fields = array('0' => '__kf_StudentId',
                            '1' => '__kf_QuestionId',
                            '2' => 'studentAnswer_kqn',
                            '3' => '__kf_SetId'
                            );
            $values = array('0' => $studentId,
                            '1' => $questionId,
                            '2' => $answer,
                            '3' => $setId
                            );
            // search for the alredy attempted question(s)
            $result = StudentModel::findRecordByField('StudentAnswer_STUANS', $fields, $values, '2');

            // Update record if found other wise create new record
            if ($result) {
                StudentModel::editRecord('StudentAnswer_STUANS', $fields, $values, count($fields), $result[0]->getRecordId());
            } else {
                StudentModel::addRecord('StudentAnswer_STUANS', $fields, $values, count($fields));
            }
        }

        $score = ($score/5) * 100;
        return view('student.score', compact('score'));
    } //end studentAnswer

    /*
     * To check the session status and destroy
     * @param Request->$request
     * @return void
     */
    public function studentLogin(Request $request)
    {
        // Destroy all the session details
        $request->session()->flush();
        return view('student.studentlogin');
    } // end studentLogin

    /*
     * To find the media file from database
     * @param $id (number)
     * @return media file
     */
    public static function findMedia($id)
    {
        $fields = array('___kp_MediaId');
        $values = array($id);
        $medRecord = StudentModel::findRecordByField('Media_MED', $fields, $values, count($fields));
        return $medRecord[0]->getField('mediaFile_kqr');
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
            3 => $request->get('phonenumber')
        );

        $returnValue = StudentModel::editRecord('User_USR', $inputs, $fields, count($fields), $request->get('recordid'));

        if ($returnValue) {
            return redirect('studentprofile');
        }

        return back();
    }
} // end class
