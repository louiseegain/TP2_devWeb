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






<?php
        foreach($annonces as $annonce){

            echo "
            <div style=' display: flex; flex-wrap: wrap; '>

    <div class='carte' style='background-color:white; width:250px; height:130px; border-radius:10px; padding:10px; margin:10px; '>
        <div style='width:60px; height:60px; position:absolute; '>
            <img src='./logo_utilisateur.png' style='width:60px; height:auto; '>
        </div>

        <div style='width:177px; height:60px; position:absolute;  margin-left: 70px; font-size:1.10em;'>
            <strong>Départ :</strong> ".$annonce->getVilleD()."
            </br>
            <strong>Arrivée :</strong> ".$annonce->getVilleA()."
            </br>
            <strong> Date :</strong> ".$annonce->getDate()." 
        </div>

        <a href=# style=' position:absolute;text-decoration:none; margin-top:90px; background-color:purple; color:white; width:250px; border-radius:5px; text-align:center; padding-top:10px; padding-bottom:10px;'>
        Visualiser l'annonce
        </a>

    </div>";
            //echo $annonce->getNom()." ".$annonce->getPrenom(). " - ".$annonce->getTel(); 
        }
echo"</div><body>
</html>";
?>

