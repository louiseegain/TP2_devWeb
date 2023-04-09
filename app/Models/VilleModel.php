<?php
namespace Models;
require_once("../accessBD.php");
use accesBD;
use Entity\Ville;
use \phputil\JSON;

class VilleModel{

    private $mesVilles;  
    private $bd; 

    public function __construct()
    {
        $this->bd = new accesBD;
        $this->mesVilles = [];
       foreach($this->bd->getVilles() as $annonce){
            $monAnnonce = new Ville($annonce['id_ville'],$annonce['nom_ville']);
            $this->mesVilles[]=($monAnnonce);
        }
    }

    public function getVilles(){
        return $this->mesVilles;
    }

   } 
?>