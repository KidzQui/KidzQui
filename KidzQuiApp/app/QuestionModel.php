<?php

/**
* File: QuestionModel.php
* Path: App/QuestionModel.php
* Purpose: fetches Questions data from filemaker database and serves to controller
* Date: 28-03-2017
* Author: Mohit Dadu
*/

namespace App;

use App\Classes\FilemakerWrapper;
use FileMaker;

class QuestionModel
{
	/*
     * show all records - Questions
     * @param $layout(text)
     * @return all records
     */
    public static function showAllQuestion($layout)
    {
    	// create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindAllCommand($layout);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function

	/*
     * find the records by type - MCQ/Puzzel/Game 
     * @param $layout(text)
     * @param $questionTypeId(number)
     * @return list of users
     */
    public static function findQuestionByType($layout, $questionTypeId)
    {
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('__kf_QuestionTypeId', $questionTypeId);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function

     /*
     * find the records by Creater Id - Evaluator
     * @param $Layout(text)
     * @param $userId(number)
     * @return individual user details
     */
    public static function findQuestionByCreaterId($layout, $userId)
    {
    	// create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('createdBy_kqn', $userId);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function

    /*
     * Add new record (student)
     * @param $Layout(text)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function addQuestion($layout, $input)
    {
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $request->setField('createdBy_kqn', $input['creatorId']);
        $request->setField('__kf_UserTypeId', 3);
        $request->setField('isActive_kqt', 'Active');
        $result = $request->commit();

        if (!FileMaker::isError($result)) {
            return true;
        }
        return false;

    }// end of function

} // end of class

