<?php
namespace Models;

use Entity\Annonce;
use \phputil\JSON;

class AnnonceModel{

    private $mesAnnonces; 
    private $file; 

    public function __construct()
    {
        $this->mesAnnonces = [];
        $this->file = '../annonces.json';
        $data = file_get_contents($this->file);
        $obj = json_decode($data);
        foreach($obj as $annonce){
            $monAnnonce = new Annonce( $annonce->villeDepart,$annonce->villeArrivee,$annonce->date, $annonce->modelVoiture,$annonce->nbrPlace, $annonce->email, $annonce->tel, $annonce->nom, $annonce->prenom);
            $this->mesAnnonces[]=($monAnnonce);
        }
    }

    public function getAnnonces(){
        return $this->mesAnnonces;
    }


   } 
?>