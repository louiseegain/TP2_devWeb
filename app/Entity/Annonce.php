<?php
namespace Entity;

class Annonce{
    private $id;
    private $villeD;
    private $villeA; 
    private $date; 
    private $modeleVoiture; 
    private $nbPlaces;
    private $email;
    private $tel; 
    private $nom; 
    private $prenom;

    public function __construct($id,$Vdepart, $Varrivee, $dateA, $modVoiture, $nbPlacesDispo, $mail, $tel, $nom, $prenom)
    {
        $this->id = $id;
        $this->villeD = $Vdepart;
        $this->villeA = $Varrivee;
        $this->date = $dateA; 
        $this->modeleVoiture = $modVoiture;
        $this->nbPlaces = $nbPlacesDispo;
        $this->email = $mail;
        $this->tel = $tel; 
        $this->nom = $nom; 
        $this->prenom = $prenom;
    }

    ///////////////////////////////////////////////////////////////////////
    //                     Getteurs de l'entity annonces                 //
    ///////////////////////////////////////////////////////////////////////
    public function getVilleD(){
        return $this->villeD;
    }

    public function getVilleA(){
        return $this->villeA;
    }

    public function getDate(){
        return $this->date;
    }

    public function getVoiture(){    
        return $this->modeleVoiture;
    }

    public function getNbPlace(){
        return $this->nbPlaces;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getTel(){
        return $this->tel;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function getId(){
        return $this->id;
    }
    ///////////////////////////////////////////////////////////////////////
    //                     Setteurs de l'entity annonces                 //
    ///////////////////////////////////////////////////////////////////////
    public function setVilleD($Vdepart)
    {
        $this->villeD=$Vdepart;
    }

    public function setVilleA($Varrivee)
    {
        $this->villeA=$Varrivee;
    }
    public function setDate($dateA)
    {
        $this->date=$dateA;
    }
    public function setVoiture($modVoiture)
    {
        $this->modeleVoiture=$modVoiture;
    }
    public function setNbPlace($nbPlacesDispo)
    {
        $this->nbPlaces=$nbPlacesDispo;
    }
    public function setEmail($mail)
    {
        $this->email=$mail;
    }

}