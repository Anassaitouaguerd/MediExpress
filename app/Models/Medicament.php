<?php
namespace App\Models;
use Core\Database;

class Medicament{

    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function display_medicaments()
    {
        $sql = "SELECT * FROM medicaments";
        $this->db->query($sql);
        $results = $this->db->fetchAllRecords();
        return $results;     
    }
    public function update_medicaments($id, $quantite)
    {
        $this->db->query("UPDATE `medicaments` SET quantity_in_stock = quantity_in_stock - :quantity_in_stock WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->bind(':quantity_in_stock', $quantite);
        $results = $this->db->fetchAllRecords();
        return $results;     
    }
}