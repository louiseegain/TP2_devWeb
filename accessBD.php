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
		$this->hote="localhost";
		$this->login="root";
		$this->passwd="root";
		$this->base="bdd_covoiturage";
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

    /*
	public function recupererEntreprise()
	{
		$requete = $this->conn->prepare("SELECT raisonSociale FROM societe WHERE codeSociete = ? ; ");
		$requete->bindValue(1,$_SESSION['idEntreprise']);
		$requete->execute();
		$row = $requete->fetch(PDO::FETCH_NUM);
		$_SESSION['NomEntreprise'] = $row[0];	
	}








	public function inserer_utilisateur($utilisateur_nom, $utilisateur_prenom, $utilisateur_login, $utilisateur_mdp, $utilisateur_codeSociete,$utilisateur_codeService,$utilisateur_valider)
	{
		$utilisateur_code = $this->recuperer_prochain_code("utilisateur","codeUtilisateur");
		if ($utilisateur_codeService =="")
		{
			$utilisateur_codeService = NULL;
		}

		$requete = $this->conn->prepare("INSERT INTO utilisateur (codeutilisateur,nom,prenom,loginUtilisateur,pwdUtilisateur,valider,codeService, codeSociete) VALUES (?,?,?,?,?,?,?,?)");
		$requete->bindValue(1, $utilisateur_code);
		$requete->bindValue(2, $utilisateur_nom);
		$requete->bindValue(3, $utilisateur_prenom);
		$requete->bindValue(4, $utilisateur_login);
		$requete->bindValue(5, $utilisateur_mdp);
		$requete->bindValue(6, $utilisateur_valider);
		$requete->bindValue(7, $utilisateur_codeService);
		$requete->bindValue(8, $utilisateur_codeSociete);

		if(!$requete->execute())
		{
			die("Erreur dans la création de l'utilisateur : ".$requete->errorCode().$requete->errorInfo()[2]);
		}
		else
		{
			$vretour= '
			<div style= "position:absolute; height:90%; width:85%; background-color: white; left:15%; top:10%; border-radius:15px;color:black; text-align: center; border:solid;">
				<div class="card" style="position:relative; width:500px;left:calc((100% - 500px)/2); top:10%; padding:30px; border-radius:30px; color:#002060; border-color:#002060;">
					<div class="card-header" style="text-align:center;   color:#002060; border-top-radius:130px;">
			  			<h6>ajout de l\'utilisateur reussit! connectez-vous</h6>
					</div>
				<div class="card-body">
				<div class="col" style="margin-top:30px;">';
				if ($utilisateur_valider==0)
				{
					$vretour .= '
					<a href="index.php?">
						<input type="button" class="btn btn-primary btn-sm btn-lg " style="width:100%; background-color:green; border-color:green;" name=btn value="continuer" ; style=" border-radius: 10px; height: 60px; width:30em; top:2em;">
					</a>';
				}
				else
				{
					$vretour .= '
					<a href="index.php?vue=utilisateur&action=afficher">
					<input type="button" class="btn btn-primary btn-sm btn-lg " style="width:100%; background-color:green; border-color:green;" name=btn value="continuer" ; style=" border-radius: 10px; height: 60px; width:30em; top:2em;">
					</a>';
				}
					
			$vretour .=' </div>';
			echo $vretour;
		}
	}



	public function modifier_utilisateur($nomUtilisateur,$prenomUtilisateur, $loginUtilisateur,$codeService,$codeUtilisateur)
	{
		$requete = $this->conn->prepare("UPDATE `utilisateur` SET  `nom`=?,`prenom`=?,`loginUtilisateur`=?,`codeService`=? WHERE `codeutilisateur`=?;");
		$requete->bindValue(1,$nomUtilisateur);
		$requete->bindValue(2,$prenomUtilisateur);
		$requete->bindValue(3,$loginUtilisateur);
		$requete->bindValue(4,$codeService);
		$requete->bindValue(5,$codeUtilisateur);

		if(!$requete->execute())
		{
			die("Erreur dans la modification Utilisateur : ".$requete->errorCode());			
		}
		else
		{
			header('Location: index.php?vue=utilisateur&action=afficher');
  			exit();
		}
	}










	public function supprimer_utilisateur_totalement($codeUtilisateur)
	{
		$requete = $this->conn->prepare("DELETE FROM 'utilisateur' where code=?");
		$requete->bindValue(1,$codeUtilisateur);	

		if(!$requete->execute())
		{
			die("Erreur dans la suppression de l'Utilisateur : ".$requete->errorCode()."teste".$requete->errorInfo());			
		}
		else
		{
			echo'<div style= "position:relative; height:50%; width:40%; background-color: #B3B4B9; left:30%; top:45; border-radius:15px;color:#003565; text-align: center; border:solid;">
			<H4 style="text-align:center; background-color:#003565; color:white; border-top-left-radius: 15px 5px; border-top-right-radius:15px 5px;"> Suppression utilisateur</H4>
			<p style="position:relative; top:10%;">L\'utilisateur a été ajouté à votre liste d\'utilisateur supprimé</p>
			</br></br>
			<a href="index.php?vue=utilisateur&action=afficher">
        	<input type=button value=Retour ></input></a>
			</div>';


		}
	}




function recuperer_utilisateur_nom_depuis_id($id)
	{
		$requete = $this->conn->prepare("select prenom, nom from utilisateur where codeutilisateur =?; ");
		$requete->bindValue(1,$id);
		$vretour="";
		if($requete->execute())
		{
			while($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$vretour.= $row[0]." ".$row[1];
			}	
		}
		else
		{
			die('Problème dans chargement : '.$requete->errorCode());
		}
	
		return $vretour;
	}

*/




}

?>