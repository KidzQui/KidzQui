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
        if (!FileMaker::isError($result)) {
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
        if (!FileMaker::isError($result)) {
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
    public static function findQuestionByCreatorId($layout, $userId)
    {
        // create connection
        $fmobject = FilemakerWrapper::getConnection();
        $request = $fmobject->newFindCommand($layout);
        $request->addFindCriterion('createdBy_kqn', $userId);
        $result = $request->execute();
        if (!FileMaker::isError($result)) {
            return $result->getRecords();
        }

        return ["No", "records", "Found", $result->getMessage()];
    } // end of function

    /*
     * Add new questions to the sets
     * @param $Layout(text)
     * @param $userId(number) ->creater Id
     * @return true or false depending on the success or failure of addition
     */
    public static function addQuestion($layout, $input)
    {
        $ret = QuestionModel::addChoice('Choice_CHC', $input['answer']);
        if (!$ret) {
            return false;
        }

        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $request->setField('questionText_kqt', $input['question']);
        $request->setField('createdBy_kqn', $input['creatorId']);
        $request->setField('questionStatus_kqt', 'Active');
        $typeId = $input['radio'] == "Objective Type" ? 1 : ($input['radio'] == "Puzzle" ? 2 : 3);
        $request->setField('__kf_QuestionTypeId', $typeId);
        $request->setField('__kf_LevelId', $input['level']);

        switch ($input['set']) {
            case 'Addition':
                $request->setField('__kf_SetId', 1);
                break;

            case 'Subtraction':
                $request->setField('__kf_SetId', 2);
                break;

            case 'Multiplication':
                $request->setField('__kf_SetId', 3);
                break;

            case 'Division':
                $request->setField('__kf_SetId', 4);
                break;

            default:
                $request->setField('__kf_SetId', 0);
                break;
        }

        $result = $request->commit();

        if (!FileMaker::isError($result)) {
            return true;
        }

        return false;
    }// end of function

    /*
     * Add new questions to the sets
     * @param $Layout(text)
     * @param choice(text)
     * @return true if choice added, else false
     */
    public static function addChoice($layout, $choice)
    {
        $fmobject = FilemakerWrapper::getConnection();
        // storing the data into the database.
        $request = $fmobject->createRecord($layout);
        $request->setField('choiceText_kqt', $choice);
        $result = $request->commit();

        if (!FileMaker::isError($result)) {
            return true;
        }

        return false;
    }
} // end of class
