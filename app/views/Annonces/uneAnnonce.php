<?php
echo "<html>
        <body style='background: linear-gradient(#B0E0E6, pink);' >";

        ?>

<style>
.carte:hover{
    box-shadow: 5px 5px 5px grey; 
}

.btnvisualiser:hover:hover{
    background-color: RED;
}
</style>




<div style=' display: flex; flex-wrap: wrap;justify-content: space-around; margin-top:10%; '>

<?php
            echo "
            

    <div class='carte' style='background-color:white; width:500px; height:400px; border-radius:10px; padding:10px; margin:10px; '>
        <div style='width:60px; height:60px; position:absolute; '>
            <img src='/logo_utilisateur.png' style='width:60px; height:auto; '>
        </div>
        <div style='  width:350px; height:25px; position:absolute; '>
            <a href='/update/annonce/".$annonce->getId()."'><img src='/logo_modif.png' style='z-index:20;left:450px;position:relative; width:25px; height:auto; '></a>
        </div>

        <div style='  width:300px; height:25px; position:absolute; '>
            <a href='/delete/annonce/".$annonce->getId()."'><img src='/logoDel.png' style='left:480px;position:relative; width:25px; height:auto; '></a>
        </div>

        <div style='width:400px; height:60px; position:absolute;  margin-left: 70px; font-size:1.10em;'>
            <strong>Départ : </strong> ".$annonce->getVilleD()->getNom()."
            </br>
            <strong>Arrivée : </strong> ".$annonce->getVilleA()->getNom()."
            </br>
            <strong> Date : </strong> ".$annonce->getDate()." 
        </div>
        <div style=' width:100%; height: 60%; margin-top:90px;'>
        <h3>Informations vehicule:</h3>
        Voiture : ".$annonce->getVoiture()." </br>
        Nombre de places : ".$annonce->getNbPlace()."</br>
        <hr/>
        <h3>Informations conducteur:</h3>
        Nom : ".$annonce->getNom()."</br>
        Prénom : ".$annonce->getPrenom()."</br>
        Mail : ".$annonce->getEmail()."</br>
        Téléphone : ".$annonce->getTel()."</br>


        </div>

        <a href='/annonces'  style=' position:absolute;text-decoration:none; margin-top:10px; background-color:purple; color:white; width:450px;margin-left:25px; border-radius:5px; text-align:center; padding-top:10px; padding-bottom:10px;'>
        Retour
        </a>

    </div>";
            
echo"</div><body>
</html>";
?>
