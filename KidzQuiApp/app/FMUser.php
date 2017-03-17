<?php

/**
* File: FMUser.php
* Path: App/FMUser.php
* Purpose: fetches data from filemaker database and serves to controller
* Date: 16-03-2017
* Author: R S DEVI PRASAD
*/

namespace App;

use App\Classes\FilemakerWrapper;
use FileMaker;




class FMUser extends FilemakerWrapper
{
    protected $fmobj;
    function __construct()
    {
        $conn = new FilemakerWrapper();
        $this->fmobj = $conn->getConnection();
    }
    public function showAll()
    {
        $cmd = $this->fmobj->newFindAllCommand('UsrManagementWeb_USR');
        $result = $cmd->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];
    }

    public function showImage()
    {
        $cmd = $this->fmobj->newFindCommand('UsrManagementWeb_USR');
        $cmd->addFindCriterion('___kp_UserId', '2');
        $result = $cmd->execute();
        if(!FileMaker::isError($result)) {
            $record = $result->getRecords();
            $imageRecord = $record[0]->getRelatedSet('usr_MED');
            $imageFile = $imageRecord[0]->getField('usr_MED::mediaFile_kqr');
            return $this->fmobj->getContainerData(urlencode($imageFile));
        }
        return false;
    }
}
