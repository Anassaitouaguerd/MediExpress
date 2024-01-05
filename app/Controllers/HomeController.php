<?php

namespace App\Controllers;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            header('Location: /');
        }
        $this->render('home');
    }
    public function login()
    {
        $this->render('login');
    }
    public function register()
    {
        $this->render('register');
    }
}