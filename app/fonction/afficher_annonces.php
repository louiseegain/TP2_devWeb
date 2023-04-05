<?php

use Controllers\AnnonceController;

function afficher_annonces(){
    echo "ceci sont mes annonces enregistrées :"; 
    $annonceController = new AnnonceController;
    $annonceController->list(); 
}

?>