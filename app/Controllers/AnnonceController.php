<?php

namespace Controllers;

require_once("../Util/view.php");

use Models\AnnonceModel;
use Models\VilleModel;
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

    public function AfficherAjoutAnnonce(){
        $villeM = new VilleModel;
        $villes = $villeM->getVilles();
        $data = ["villes" => $villes]; 
        $view = new View(); 
        $view->render("Annonces/ajoutAnnonce",$data);
    }
    
    public function validerAjoutUneAnnonce($data){
        $annonceModel = new AnnonceModel;
        $annonceModel->validerAjoutUneAnnonce($data); 
    }

    public function ModifierUneAnnonce($id){
        $annonceModel = new AnnonceModel;
        $villeM = new VilleModel;
        $annonce = $annonceModel->getUneAnnonce($id); 
        $villes = $villeM->getVilles();
        $data = ["annonce" => $annonce, "villes" => $villes]; 
        $view = new View(); 
        $view->render("Annonces/modifAnnonce",$data);
    }

    public function validerModifUneAnnonce($data){
        $annonceModel = new AnnonceModel;
        $annonceModel->validerModifUneAnnonce($data); 

    }

    public function supprimerAnnonce($id){
        $annonceModel = new AnnonceModel;
        $annonceModel->supprimerAnnonce($id); 
    }
}

?>