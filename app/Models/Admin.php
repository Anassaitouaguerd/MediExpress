<?php

namespace App\Models;

use Core\Database;

class Admin extends User implements Authenticatable
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password, user_type) VALUES (:username, :email, :password, :user_type)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':user_type', "admin");
        return $this->db->execute();
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->fetchSingleRecord();

        if ($row && password_verify($password, $row->password)) {
            return $row;
        }
        return false;
    }
}

