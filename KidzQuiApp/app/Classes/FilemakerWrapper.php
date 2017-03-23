<?php
/**
* File: FilemakerWrapper.php
* Path: App/Classes/FilemakerWrapper.php
* Purpose: Connect filemaker database.
* Date: 22-03-2017
* Author: Mohit Dadu
*/

namespace App\Classes;
use FileMaker;

class FilemakerWrapper
{
    public static function getConnection()
    {
        return new FileMaker(
        env("DB_DATABASE"),
        env("DB_HOST"),
        env("DB_USERNAME"),
        env("DB_PASSWORD")
        );
    }
}