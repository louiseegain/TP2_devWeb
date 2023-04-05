<?php
        foreach($annonces as $annonce){
            echo $annonce->getNom()." ".$annonce->getPrenom(). " - ".$annonce->getTel(); 
            echo"</br>";
        }
?>