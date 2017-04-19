<?php

/**
* File: StudentModel.php
* Path: App/StudentModel.php
* Purpose: fetches data from filemaker database and serves to controller
* Date: 22-03-2017
* Author: Mohit Dadu
*/

namespace App;

use App\Classes\FilemakerWrapper;
use FileMaker;

class StudentModel
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

        return false;
    } // end of function

    /*
     * find the records by fields array (student)
     * @param $Layout(text)
     * @param $field(string)
     * @param $value(string)
     * @return records details
     */
    public static function findRecordByField($layout, $field, $value, $numberOfFields, $sortField=null, $sortType=null)
    {
        // create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $i=0;

        while ( $i < $numberOfFields ) {
            $request->addFindCriterion($field[$i], $value[$i]);
            $i += 1;
        }

        if($sortField && $sortType) {
            $request->addSortRule($sortField, 1, $sortType);
        }

        $result = $request->execute();

        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }

        return false;
    } // end of function

    /*
     * find the records by fields array (student)
     * @param $Layout(text)
     * @param $field(string)
     * @param $value(string)
     * @return records details
     */
    public static function userDetails($layout, $input)
    {
        // create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('emailAddress_kqt', '=='.$input['username']);
        $request->addFindCriterion('password_kqt','==' .$input['password']);
        $result = $request->execute();

        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }

        return false;
    }

    /*
     * Add new record (student)
     * @param $Layout(string)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function addRecord($layout,$fields, $values, $numberOfFields)
    {
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $i = 0;

        while ($i < $numberOfFields) {
            $request->setField($fields[$i], $values[$i]);
            $i += 1;
        }

        $result = $request->commit();

        if (!FileMaker::isError($result)) {
            return true;
        }

        return false;

    }// end of function

    /*
     * edit record
     * @param $Layout(string)
     * @param $userId(number) ->creater Id
     * @return void
     */
    public static function editRecord($layout, $inputs, $fields, $numberOfFields, $recordId)
    {
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newEditCommand($layout, $recordId);
        $i = 0;

        while ($i < $numberOfFields) {
            $request->setField($fields[$i], $inputs[$i]);
            $i += 1;
        }

        $result = $request->execute();

        if (!FileMaker::isError($result)) {
            return true;
        }

        return false;

    }// end of function
}
