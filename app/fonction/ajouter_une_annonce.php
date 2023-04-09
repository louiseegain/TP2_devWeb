<?php

use Controllers\AnnonceController;

function ajouter_une_annonce(){
    $annonceController = new AnnonceController;
    $annonceController->AfficherAjoutAnnonce(); 
}

?>