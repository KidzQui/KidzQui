<?php

/**
* File: FilemakerWrapper.php
* Path: App/Classes/FilemakerWrapper.php
* Purpose: Connects to filemaker database
* Date: 16-03-2017
* Author: R S DEVI PRASAD
*/
namespace App\Classes;
use FileMaker;

class FilemakerWrapper
{
    protected $db;
    function __construct()
    {
        $this->db = new FileMaker(
        env("DB_DATABASE"),
        env("DB_HOST"),
        env("DB_USERNAME"),
        env("DB_PASSWORD")
        );
    }
    public function getConnection()
    {
        return $this->db;
    }
}
