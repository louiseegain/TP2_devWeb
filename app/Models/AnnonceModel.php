<?php
namespace Models;
require_once("../accessBD.php");

use accesBD;
use Entity\Annonce;
use \phputil\JSON;

class AnnonceModel{

    private $mesAnnonces; 
    private $file; 
    private $bd; 

    public function __construct()
    {
        $this->bd = new accesBD;
        $this->mesAnnonces = [];
       foreach($this->bd->getAnnonces() as $annonce){
            $monAnnonce = new Annonce($annonce['id_annonce'],$annonce['villeD'],$this->bd->getNomVille($annonce['villeD']), $annonce['villeA'], $this->bd->getNomVille($annonce['villeA']), $annonce['date'], $annonce['heure'], $annonce['model'], $annonce['nbplaces'], $annonce['email'], $annonce['telephone'],$annonce['nom'], $annonce['prenom']);
            $this->mesAnnonces[]=($monAnnonce);
        }


        /*
        $config = (require "../config.php");

        $this->mesAnnonces = [];
        $this->file = $config['PATH_FILE'];
        $data = file_get_contents($this->file);
        $obj = json_decode($data);
        foreach($obj as $annonce){
            $monAnnonce = new Annonce($annonce->idAnnonce, $annonce->villeDepart,$annonce->villeArrivee,$annonce->date, $annonce->modelVoiture,$annonce->nbrPlace, $annonce->email, $annonce->tel, $annonce->nom, $annonce->prenom);
            $this->mesAnnonces[]=($monAnnonce);
        }*/

    }

    public function getAnnonces(){
        return $this->mesAnnonces;
    }


    public function getUneAnnonce($id){
        $annonceRetour = null; 
        foreach ($this->mesAnnonces as $annonce){
            if($annonce->getId() == $id){
                $annonceRetour = $annonce; 
            }
        }
        return $annonceRetour; 
    }

    public function validerModifUneAnnonce($data){
        $retour = $this->bd->updateAnnonce($data['id'], $data['villeD'],$data['villeA'],$data['date'],$data['voiture'],$data['nbPlace'],$data['mail'],$data['telephone'],$data['prenom'],$data['nom']);

        if($retour != null){
            echo ($retour);
            echo'<a href="/annonces">Retour à la page d\'accueil</a>';
        }else{
            header('Location: /annonces');
        }
    }

    public function validerAjoutUneAnnonce($data){
        $retour = $this->bd->insertAnnonce($data['villeD'],$data['villeA'],$data['date'],$data['voiture'],$data['nbPlace'],$data['mail'],$data['telephone'],$data['prenom'],$data['nom']);

        if($retour != null){
            echo ($retour);
            echo'<a href="/annonces">Retour à la page d\'accueil</a>';
        }else{
            header('Location : /annonces');
        }
    }

    public function supprimerAnnonce($id){
        $retour = $this->bd->deleteAnnonce($id);

        if($retour != null){
            echo ($retour);
            echo'<a href="/annonces">Retour à la page d\'accueil</a>';
        }else{
            header('Location : /annonces');
        }
    }

   } 
?>