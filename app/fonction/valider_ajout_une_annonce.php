<?php

use Controllers\AnnonceController;

function valider_ajout_une_annonce(){
    $annonceController = new AnnonceController;
    $annonceController->validerAjoutUneAnnonce($_POST); 
    echo'je passe par la ';
}

?>