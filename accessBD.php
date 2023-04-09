<?php

class accesBD
{
	private $hote;
	private $login;
	private $passwd;
	private $base;
	private $conn;
	
	// Nous construisons notre connexion
	public function __construct()
	{ 
		$const = require("../config.php");
		$this->hote= $const['SERVER'];
		$this->login= $const['LOGIN'];
		$this->passwd= $const['PASSWORD'];
		$this->base= $const['BDD_NAME'];
		$this->connexion();
	}

	//connexion a la base de donnée
	private function connexion()
	{
		try{
            $this->conn = new PDO("mysql:host=".$this->hote.";dbname=".$this->base.";charset=utf8", $this->login, $this->passwd);
        }catch(PDOException $e){
            die("La connexion à  la base de donnees à echouée : ".$e->getMessage());
        }
	}

	public function get_conn(){
		return $this->conn;
	}

	public function recupererVilles()
	{
		$requete = $this->conn->prepare("SELECT * FROM ville; ");
		$requete->execute();
		$rows = $requete->fetch(PDO::FETCH_NUM);
        return $rows; 	
	}

    public function getAnnonces()
	{
		$requete = $this->conn->prepare("SELECT * FROM annonce; ");
		$requete->execute();
		$rows = $requete->fetchAll();
        return $rows; 	
	}

    public function getVilles()
	{
		$requete = $this->conn->prepare("SELECT * FROM ville order by nom_ville; ");
		$requete->execute();
		$rows = $requete->fetchAll();
        return $rows; 	
	}

    public function getNomVille($id)
	{
		$requete = $this->conn->prepare("SELECT nom_ville FROM ville where id_ville = ".$id."; ");
		$requete->execute();
		$rows = $requete->fetchAll();
        return $rows[0]['nom_ville']; 	
	}

	public function getNextIdAnnonce(){
		$requete = $this->conn->prepare("SELECT MAX(id_annonce) FROM annonce ; ");
		$requete->execute();
		$rows = $requete->fetchAll();
        return $rows[0]['MAX(id_annonce)']+1; 	
	}


	public function insertAnnonce($idVilleD,$idVilleA,$date,$model,$nbplaces,$email,$tel,$prenom,$nom){
		$retour = null;
		$requete = $this->conn->prepare("INSERT INTO `annonce`(`id_annonce`, `villeD`, `villeA`, `date`, `model`, `nbplaces`, `email`, `telephone`, `nom`, `prenom`) VALUES (?,?,?,?,?,?,?,?,?,?);");
		$requete->bindValue(1, $this->getNextIdAnnonce());
		$requete->bindValue(2, $idVilleD);
		$requete->bindValue(3, $idVilleA);
		$requete->bindValue(4, $date);
		$requete->bindValue(5, $model);
		$requete->bindValue(6, $nbplaces);
		$requete->bindValue(7, $email);
		$requete->bindValue(8, $tel);
		$requete->bindValue(9, $nom);
		$requete->bindValue(10, $prenom);
		if(!$requete->execute())
		{
			$retour = 	($requete->errorCode()." - ".$requete->errorInfo()[2]);		
		}
		var_dump($retour);
		return $retour; 
	}

	public function updateAnnonce($id, $idVilleD,$idVilleA,$date,$model,$nbplaces,$email,$tel,$prenom,$nom){
		$retour = null;
		$requete = $this->conn->prepare("update annonce SET  villeD=?, villeA=?, date=?, model=?, nbplaces=?, email=?, telephone=?, nom=?, prenom=? where id_annonce=?;");

		$requete->bindValue(1, intval($idVilleD,10));
		$requete->bindValue(2, intval($idVilleA,10));
		$requete->bindValue(3, $date);
		$requete->bindValue(4, $model);
		$requete->bindValue(5, $nbplaces);
		$requete->bindValue(6, $email);
		$requete->bindValue(7, $tel);
		$requete->bindValue(8, $nom);
		$requete->bindValue(9, $prenom);
		$requete->bindValue(10, intval($id));
		if(!$requete->execute())
		{
			$retour = 	($requete->errorCode()." - ".$requete->errorInfo()[2]);		
		}
		var_dump($requete->errorInfo());
		return $retour; 

	}
	
    public function recupererAnnonce($id)
	{
		$requete = $this->conn->prepare("SELECT * FROM annonce where id_ville = ".$id."");
		$requete->execute();
		$rows = $requete->fetch(PDO::FETCH_NUM);
        return $rows; 	
	}

	public function deleteAnnonce($id){
		$retour = null;
		$requete = $this->conn->prepare("delete from annonce where id_annonce = ?;");

		$requete->bindValue(1, $id);
		if(!$requete->execute())
		{
			$retour = 	($requete->errorCode()." - ".$requete->errorInfo()[2]);		
		}
		var_dump($requete->errorInfo());
		return $retour; 
	}

  




}

?>