<?php

namespace App\Controllers;
use App\Models\UsurioModel;
use ViewHelper;

class HomeController
{
    public function index()
    {
        // $users = UsurioModel::getAll();

        // include_once('../app/Views/home.php');
        // print_r("esta llegando");
         return ViewHelper::view('home');
    }
}
