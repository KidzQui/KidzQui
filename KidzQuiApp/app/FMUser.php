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

class FMUser
{
    public static function showAll()
    {
        $fmobj = FilemakerWrapper::getConnection();
        $cmd = $fmobj->newFindAllCommand('UsrManagementWeb_USR');
        $result = $cmd->execute();
        if(!FileMaker::isError($result)) {
            return $result->getRecords();
        }
        return ["No", "records", "Found", $result->getMessage()];
    }
}
