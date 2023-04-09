<?php
namespace Entity;

class Ville{
    private $id;
    private $nom;


    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;

    }

    ///////////////////////////////////////////////////////////////////////
    //                     Getteurs de l'entity annonces                 //
    ///////////////////////////////////////////////////////////////////////
    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    ///////////////////////////////////////////////////////////////////////
    //                     Setteurs de l'entity annonces                 //
    ///////////////////////////////////////////////////////////////////////
    public function setId($id)
    {
        $this->id=$id;
    }

    public function setNom($nom)
    {
        $this->nom=$nom;
    }

}