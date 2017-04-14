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

}
