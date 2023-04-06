<?php

namespace Controllers;

require_once("../Util/view.php");

use Models\AnnonceModel;
use Util\View;

class AnnonceController
{
    public function AfficherListAnnonce(){
        $annonceModel = new AnnonceModel;
        $annonces = $annonceModel->getAnnonces(); 
        
        $data = ["annonces" => $annonces]; 
        $view = new View(); 
        $view->render("Annonces/listAnnonces",$data);
    }

    public function AfficherUneAnnonce($id){
        $annonceModel = new AnnonceModel;
        $annonce = $annonceModel->getUneAnnonce($id); 

        $data = ["annonce" => $annonce]; 
        $view = new View(); 
        $view->render("Annonces/uneAnnonce",$data);
    }
}

?>