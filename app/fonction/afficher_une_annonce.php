<?php

use Controllers\AnnonceController;

function afficher_une_annonce($param){
    $annonceController = new AnnonceController;
    $annonceController->AfficherUneAnnonce($param["id"]); 
}

?>