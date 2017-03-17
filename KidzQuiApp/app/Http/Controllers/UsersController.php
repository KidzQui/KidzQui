<?php

/**
* File: UsersController.php
* Path: App/Http/Controllers/FMUser.php
* Purpose: Calls the FMUser class to fetch the data from filemaker database
* Date: 16-03-2017
* Author: R S DEVI PRASAD
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FMUser;
use App\Http\Requests;
use App\Classes;

class UsersController extends Controller
{
    /*
     * Show all the list of users in the database
     * @param void
     * @return list of users
     */
    public $fmdb;
    function __construct()
    {
        $connection = new FMUser();
        $this->fmdb = $connection;
    }
    public function index()
    {
        $records = $this->fmdb->showAll();
        return view('users.index', compact('records'));
    }

    public function image()
    {
        $record = $this->fmdb->showImage();
        return view('users.index', $record);
    }
}
