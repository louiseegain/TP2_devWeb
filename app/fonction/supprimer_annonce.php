<?php

use Controllers\AnnonceController;

function supprimer_annonce($id){
    $annonceController = new AnnonceController;
    $annonceController->supprimerAnnonce($id['id']); 

}

?>