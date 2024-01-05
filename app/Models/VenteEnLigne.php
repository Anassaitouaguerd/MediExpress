<?php

namespace App\Models;

use Core\Database;

class VenteEnLigne extends Vente
{
    public function add($medicament_id, $quantite){
        $currentDate = date('Y-m-d');
        $this->db->query('INSERT INTO sales (date, patient_id, medicament_id, quantity, sale_type) VALUES (:date, :patient_id, :medicament_id, :quantity, :sale_type)');
        $this->db->bind(':date', $currentDate);
        $this->db->bind(':patient_id', $_SESSION['id']);
        $this->db->bind(':medicament_id', $medicament_id);
        $this->db->bind(':quantity', $quantite);
        $this->db->bind(':sale_type', "En Ligne");
        return $this->db->execute();
    }

}