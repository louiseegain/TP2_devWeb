<?php

use Controllers\AnnonceController;

function afficher_annonces(){
    $annonceController = new AnnonceController;
    $annonceController->AfficherListAnnonce(); 
}

?>