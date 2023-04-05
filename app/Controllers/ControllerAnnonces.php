<?php

namespace Controllers;

require_once("../Util/view.php");

use Models\annonceModel;
use Util\View;

class AnnonceController
{
    public function list(){
        $annonceModel = new annonceModel; 
        $annonces = $annonceModel->getAnnonces(); 
        
        $data = ["annonces" => $annonces]; 
        $view = new View(); 
        $view->render("Annonce/list",$data);
    }
}

?>