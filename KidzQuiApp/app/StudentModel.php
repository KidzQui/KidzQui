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

}
