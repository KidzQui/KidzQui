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
     * @param $Layout(string)
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
     * @param $Layout(string)
     * @param $userTypeId(number)
     * @return list of users
     */
    public static function findRecordByField($layout, $fieldName, $fieldValue, $sortField=null, $sortType=null)
    {
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion($fieldName, $fieldValue);
        if($sortField && $sortType) {
            $request->addSortRule($sortField, 1, $sortType);
        }
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];

    } // end of function

    /*
     * Edit the record (student/evaluator)
     * @param $Layout(string)
     * @param $userTypeId(number)
     * @param $status(string)
     * @return void
     */
    public static function editStatus($layout, $userId, $status)
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
     * @param $Layout(string)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function addUser($layout, $input)
    {
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $request->setField('firstName_kqt', $input['firstname']);
        $request->setField('lastName_kqt', $input['lastname']);
        $request->setField('emailAddress_kqt', $input['emailaddress']);
        $request->setField('phoneNumber_kqt', $input['phonenumber']);
        $request->setField('createdBy_kqn', $input['creatorId']);
        $request->setField('__kf_UserTypeId', 3);
        $request->setField('isActive_kqt', 'Active');
        $result = $request->commit();

        if (!FileMaker::isError($result)) {
            return true;
        }
        return false;

    }// end of function

    /*
     * edit record (student)
     * @param $Layout(string)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function editRecord($layout, $input )
    {
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newEditCommand($layout, $input['recordid']);
        $request->setField('firstName_kqt', $input['firstname']);
        $request->setField('lastName_kqt', $input['lastname']);
        $request->setField('emailAddress_kqt', $input['emailaddress']);
        $request->setField('phoneNumber_kqt', $input['phonenumber']);
        $result = $request->execute();

        if (!FileMaker::isError($result)) {
            return true;
        }
        return false;

    }// end of function

    public static function userDetails($layout, $input)
    {
        // create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('emailAddress_kqt', '=='.$input['username']);
        $request->addFindCriterion('password_kqt', $input['password']);
        $result = $request->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return false;
    }

    public static function createRecord($layout, $inputs, $fields, $numberOfFields)
    {
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $i = 0;
        while ($i < $numberOfFields) {
            $request->setField($fields[$i], $inputs[$i]);
            $i += 1;
        }
        $result = $request->commit();
        if (!FileMaker::isError($result)) {
            return true;
        }
        return false;
    }

} // end of class
