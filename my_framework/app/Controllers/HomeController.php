<?php

namespace App\Controllers;
use App\Models\UsurioModel;
use ViewHelper;
use App\Controllers\AuthController;

class HomeController
{
    public function index()
    {
        // $users = UsurioModel::getAll();
        if (!AuthController::isLoggedIn()) {
            // Redirigir a la página de inicio de sesión
            return ViewHelper::view('/auth/login');
            // header('Location: /login');
            exit;
        } else {
            return ViewHelper::view('home');
        }
    }
}
