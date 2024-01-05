<?php

namespace App\Models;

use Core\Database;

abstract class User
{
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetchSingleRecord();
    }

    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->fetchAllRecords();
    }
}
