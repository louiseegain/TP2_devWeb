<?php

use Controllers\AnnonceController;

function valider_modifier_une_annonce(){
    $annonceController = new AnnonceController;
    $annonceController->validerModifUneAnnonce($_POST); 

}

?>