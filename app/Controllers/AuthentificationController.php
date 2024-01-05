<?php
namespace App\Controllers;
use App\Models\PatientEnLigne;

class AuthentificationController{

    private $PatientEnLigne;
    private $data;

    public function __construct(){
        $this->PatientEnLigne = new PatientEnLigne();
        
    }

    public function singIn(){
            extract($_POST);
            $login = $this->PatientEnLigne->login($email, $password);
            if ($login && password_verify($password, $login->password)) {
                $_SESSION['id'] = $login->id;
                $_SESSION['username'] = $login->username;
                $_SESSION['role'] = $login->user_type;
                header('location: /dashboard');
            }else {
                $_SESSION['error'] = "Your email or password is incorrect";
                header('location: /');
            }
        
    }

    public function singUp(){
        extract($_POST);
        $this->data = ['username' => $username, 'email' => $email, 'password' => $password, 'cpassword' => $cpassword];
        $login = $this->PatientEnLigne->login($this->data['email'], $this->data['password']);

        if ($login) {
            $_SESSION['error'] = "this email is already existed";
            header('location: /register');
        }else {
            if ($password == $cpassword) {
                $this->PatientEnLigne->register($this->data);
                header('location: /');
            }else{
                $_SESSION['error'] = "The passwords you entered don't match";
                header('location: /register');
            }
        }
        
    }

    public function logout(){
        session_destroy();
        header('Location: /');
    }
}
