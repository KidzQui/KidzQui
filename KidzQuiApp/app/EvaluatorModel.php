<?php

/**
* File: EvaluatorModel.php
* Path: App/EvaluatorModel.php
* Purpose: fetches data from filemaker database and serves to controller
* Date: 22-03-2017
* Author: Mohit Dadu
*/

namespace App;

use App\Classes\FilemakerWrapper;
use FileMaker;

class EvaluatorModel
{
	/*
     * show all records 
     * @param $Layout(text)
     * @return all records
     */
    public static function showAllRecord($layout)
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
     * find the records by type (student/evaluator)
     * @param $Layout(text)
     * @param $userTypeId(number)
     * @return list of users
     */
    public static function findRecordByType($layout, $userTypeId)
    {	
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('__kf_UserTypeId', $userTypeId);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function

     /*
     * find the records by Id (student)
     * @param $Layout(text)
     * @param $userId(number)
     * @return individual user details
     */
    public static function findRecordById($layout, $userId)
    {	
    	// create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('___kp_UserId', $userId);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function


    /*
     * Edit the record (student/evaluator)
     * @param $Layout(text)
     * @param $userTypeId(number)
     * @param $status(text)
     * @return void
     */
    public static function editRecord($layout, $userTypeId, $status)
    {
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('___kp_UserId', $userId);
        $result = $request->execute();
    
        $records = $result->getRecords();
        //  storing data record into database
        foreach ($records as $record) {
            $record->setField('isActive_kqt', $status);
            $record->commit();}
  
    } // end of function

    /*
     * Add new record (student)
     * @param $Layout(text)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function addUser($layout, $userId)
    {   
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $request->setField('studentName', $name);
        $request->setField('email', $email);
        $request->setField('phoneNo', $phone);
        $result = $request->commit();

    }// end of function

} // end of class

