<?php
namespace App\Controllers;
use App\Models\Medicament;
use App\Controllers\Controller;

class MedicamentController extends Controller {

    private $MedicamentModel;

    public function __construct(){
        $this->MedicamentModel = new Medicament();
    }
    public function displayMedicaments(){
        $results = $this->MedicamentModel->display_medicaments();
        $this->render('medicaments', ['results' => $results]);
    }
    public function updateMedicaments(){
        $results = $this->MedicamentModel->display_medicaments();
        $this->render('medicaments', ['results' => $results]);
    }
}