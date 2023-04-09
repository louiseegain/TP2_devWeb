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
            
    <form action='/validate/add/annonce' method=POST>
    <div class='carte' style='background-color:white; width:450px; height:450px; border-radius:10px; padding:10px; margin:10px; '>
        <div style='width:60px; height:60px; position:absolute; '>
            <img src='/logo_utilisateur.png' style='width:60px; height:auto; '>
        </div>


        <div style='width:177px; height:60px; position:absolute;  margin-left: 70px; font-size:1.10em;'>
            <strong>Départ :</strong> 
            
            <select name=villeD id=villeD required>";
            foreach($villes as $ville){

                    echo "<option value=".$ville->getId().">".$ville->getNom()."</option>";
                
            }

            echo"
            </select>



            </br>
            <strong>Arrivée : </strong><select name=villeA id=villeA required>";
            foreach($villes as $ville){

                    echo "<option value=".$ville->getId().">".$ville->getNom()."</option>";
                
            }
            echo"
            </select>
            </br>
            <strong> Date :</strong> <input style='position:relative; width: 100px;' type=date name=date required>
        </div>
        <div style=' width:100%; height: 60%; margin-top:100px;'>
        <h3>Informations véhicule:</h3>
        Voiture : <input style='position:relative; width: 100px;' type=text name=voiture required ></br>
        Nombre de places : <input style='position:relative; width: 100px;' type=number name=nbPlace  min=0 required></br>
        <hr/>
        <h3>Informations conducteur:</h3>
        Nom : <input style='position:relative; width: 100px;' type=text name=nom required></br>
        Prénom : <input  style='position:relative; width: 100px;' type=text name=prenom required></br>
        Mail : <input  style='position:relative; width: 200px;' type=mail name=mail required></br>
        Téléphone : <input  style='position:relative; width: 200px;' type=number name=telephone required min=0600000000 max=0999999999></br>


        </div>

        <a href='/annonces'  style=' position:absolute;text-decoration:none; margin-top:10px; background-color:purple; color:white; width:140px;margin-left:25px; border-radius:5px; text-align:center; padding-top:10px; padding-bottom:10px;'>
        Retour
        </a>
        <input type=submit value='valider' style=' position:absolute;text-decoration:none; margin-top:10px; background-color:green; color:white; width:140px;margin-left:175px; border-radius:5px; text-align:center; padding-top:10px; padding-bottom:10px;' >
        </form>
    </div>";
            
echo"</div><body>
</html>";
?>
