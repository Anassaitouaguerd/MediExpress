<?php
namespace App\Controllers;
use App\Models\VenteEnLigne;
use App\Models\Medicament;
use App\Controllers\Controller;

class VenteEnLigneController extends Controller{
    public $newVente;
    public function __construct(){
        $this->newVente = new VenteEnLigne();
    }
    public function buy(){
        extract($_POST);
        $this->newVente->add($medicamentId, $quantite);
        $update = new Medicament();
        $update->update_medicaments($medicamentId, $quantite);
        header('location:/medicaments');
    }
}