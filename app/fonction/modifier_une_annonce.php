<?php

use Controllers\AnnonceController;

function modifier_une_annonce($param){
    $annonceController = new AnnonceController;
    $annonceController->ModifierUneAnnonce($param["id"]); 
}

?>