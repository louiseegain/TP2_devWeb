<?php
echo "<html>
<style>
.carte:hover{
    box-shadow: 5px 5px 5px grey; 
}

.btnvisualiser:hover:hover{
    background-color: RED;
}
</style>
        <body style='background: linear-gradient(#B0E0E6, pink);' >";

        ?>



<a href="/add/annonce" style='  position:absolute; margin-left:20%; top:20px; width:150px; text-decoration:none;  background-color:purple; color:white;  border-radius:5px; text-align:center; padding:10px; '>ajouter une annonce</a>



<div style=' display: flex; flex-wrap: wrap;justify-content: space-around;   margin-top:10%; width:60%;  margin-left:20%;'>

<?php
        foreach($annonces as $annonce){


            echo "
            

    <div class='carte' style='background-color:white; width:400px; height:130px; border-radius:10px; padding:10px; margin:10px; '>
        <div style='width:60px; height:60px; position:absolute; '>
            <img src='./logo_utilisateur.png' style='width:60px; height:auto; '>
        </div>

        <div style='width:380px; height:60px; position:absolute;  margin-left: 70px; font-size:1.10em;'>
            <strong>Départ :</strong> ".$annonce->getVilleD()->getNom()."
            </br>
            <strong>Arrivée :</strong> ".$annonce->getVilleA()->getNom()."
            </br>
            <strong> Date :</strong> ".$annonce->getDate()." 
        </div>

        <a href='/annonces/".$annonce->getId()."'  style=' position:absolute;text-decoration:none; margin-top:90px; background-color:purple; color:white; width:400px; border-radius:5px; text-align:center; padding-top:10px; padding-bottom:10px;'>
        Visualiser l'annonce
        </a>

    </div>";
            //echo $annonce->getNom()." ".$annonce->getPrenom(). " - ".$annonce->getTel(); 
        }
echo"</div><body>
</html>";
?>

