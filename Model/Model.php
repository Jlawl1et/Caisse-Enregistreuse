<?php
class Model {
	private $bd;
	private static $instance = null;

	/**
	 * Methode terminée, ne pas modifier
	 */
	private function __construct(){
        $this->bd = new PDO('mysql:host=localhost;dbname=bde','root');
    	$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$this->bd->query("SET nameS 'utf8'");
	}

	/**
	 * Methode terminée, a ne pas modifier
	 * @return Model|null
	 */
	public static function getModel(){
    	if (self::$instance == null){
        	self::$instance = new self();
    	}
    	return self::$instance;
	}

	/**
	 * Methode terminée, en phase de test, à ne pas modifier
 	* cette fonction permet de verifier si le compte est dans la base de données
 	* paramêtres : identifiant et mot de passe
 	* return bool
 	*/
	//public function connexion($identifiant, $motDePasse){
	//	$reqette = $this->bd->prepare("SELECT id_utilisateur, mdp from utilisateur where identifiant = ':identifiant'");
	//	$reqette->bindValue(':identifiant', $identifiant);
	//	$reqette->execute();
	//	$tab = $reqette->fetch(PDO::FETCH_ASSOC);
	//	$row = $reqette->rowCount();

	//	if ($row == 1){
	//    	$motDePasseHash = crypt($motDePasse , "md5");
	//    	if(password_verify($tab["mdp"] , $motDePasseHash)){
	//        	return true;
	//    	}
	//	return false;
	//	}
	//}


	//DEBUT GETTERS//
		//DEBUT GET UTILISATEUR//
	public function getMotDePasse($identifiant){
		$requette = $this->bd->prepare("SELECT mdp from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getIdentifiant($nom){
		$requette = $this->bd->prepare("SELECT id_utilisateur from utilisateur where nom = :nom");
		$requette->bindValue('nom', $nom);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getNom($identifiant){
		$requette = $this->bd->prepare("SELECT nom from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getPrenom($identifiant){
		$requette = $this->bd->prepare("SELECT prenom from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getMail($identifiant){
		$requette = $this->bd->prepare("SELECT mail from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getRole($identifiant){
		$requette = $this->bd->prepare("SELECT role from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getDateCreation($identifiant){
		$requette = $this->bd->prepare("SELECT date_creation from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getDateConnexion($identifiant){
		$requette = $this->bd->prepare("SELECT date_connexion from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getPointsFid($identifiant){
		$requette = $this->bd->prepare("SELECT point_fid from utilisateur where id_utilisateur = :identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
		//FIN GET UTILISATEUR//

		//DEBUT GET ARTICLE//
	public function getNomArticle($idArticle){
		$requette = $this->bd->prepare("SELECT nom_article from article where id_article = :identifiant");
		$requette->bindValue('identifiant', $idArticle);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getPrix($idArticle){
		$requette = $this->bd->prepare("SELECT prix from article where id_article = :identifiant");
		$requette->bindValue('identifiant', $idArticle);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getCategorie($idArticle){
		$requette = $this->bd->prepare("SELECT categorie from article where id_article = :identifiant");
		$requette->bindValue('identifiant', $idArticle);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getInfo($idArticle){
		$requette = $this->bd->prepare("SELECT informations from article where id_article = :identifiant");
		$requette->bindValue('identifiant', $idArticle);
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function getNbArticle(){
		$requette = $this->bd->prepare("SELECT COUNT(*) from article");
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
		//FIN GET ARTICLE//

	// FIN DES GETTERS//
	public function consulterInventaire(){
		$requette = $this->bd->prepare("SELECT * from article");
		$requette->execute();
		return $requette->fetchall();;
	}

	/**
	 * @return mixed
	 */
	public function calculAchat(){
  		$reqette = $this->bd->prepare("SELECT SUM(prix) from article  ");
  		$reqette->execute();
  		$tab = $reqette->fetch(PDO::FETCH_NUM);
  		return $tab['0'];
  	}

	public function enregistrementAchats($achats) {
    	// Préparez la requête d'insertion
    	//$stmt = $conn->prepare("INSERT INTO achats (nom, prix, quantite, date) VALUES ($_GET['nom'], $_GET['nom'], $_GET['nom'], $_GET['nom'])");
    	//$stmt->bind_param("sdss", $nom, $prix, $quantite, $date);

    	// Affectez les valeurs aux paramètres
    	//$nom = $achats->nom;
    	//$prix = $achats->prix;
    	//$quantite = $achats->quantite;
    	//$date = $achats->date;

    	// Exécutez la requête
    	//$stmt->execute();

    	// Fermez la connexion à la base de données
    	//$conn->close();
}

	public function maxAchat(){
		return null;
	}

	public function consulterHistorique($id_utilisateur){
		$requette = $this->bd->prepare("SELECT * FROM historique_commande_util WHERE id_utilisateur = :id_utilisateur ORDER BY date_achat DESC");
		$requette->bindValue(':id_utilisateur',$id_utilisateur);
		$requette->execute();
		return $requette->fetchall();
	}

	public function consulterHistoriqueVentes(){
		$requete = $this->bd->prepare("SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article ORDER BY date_achat DESC");
		$requete->execute();
		return $requete->fetchAll();
	}

	public function consulterBilan(){
		$requete = $this->bd->prepare("SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article WHERE DATE_FORMAT(date_achat,'%m %Y')=DATE_FORMAT(CURRENT_DATE,'%m %Y') ORDER BY heure_achat DESC");
		$requete->execute();
		return $requete->fetchAll();
	}

	public function consulerPariteAchat(){
		$requette = $this->bd->prepare("SELECT * from historique_commande order by heure_achat,date_achat DESC LIMIT 20 ");
  		$requette->execute();
  		return $requette->fetchall();
	}

	/**
	 * Fonction a refaire
	 * TODO
	 * @param $article
	 * @return void
	 */
	public function estEnStock($article){
		$reqette = $this->bd->prepare("SELECT nb_article from article where id_article = :id_article  ");
		$reqette->bindValue(':id_article',$article);
  		$reqette->execute();
  		$tab = $reqette->fetch(PDO::FETCH_NUM);
		if ($tab[0] > 0){
			echo '<p>'. " l'article numero " . $article . ' est encore en stock ' . "</p>";
		}
		else{
			echo '<p>'. " l'article numero " . $article . " n'est plus en stock " . "</p>";
		}
}

	public function reduction(){
    	return null;
	}

	public function ajouterCompte($identifiant, $nom, $prenom, $mail, $motDePasse, $pf = 5){
    	$requette = $this->bd->prepare("INSERT INTO utilisateur(id_utilisateur, nom, prenom, mail, mdp, role, point_fid ) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role, :pointsFidel)");
    	$role = 'utilisateur';
    	$motDePasseHash = crypt($motDePasse, 'md5');
    	$requette->execute(array(
			'identifiant' => $identifiant ,
			'nom' => $nom ,
			'prenom' => $prenom ,
			'mail' => $mail,
			'motDePasse' => $motDePasseHash,
			'role' => $role,
			'pointsFidel' => $pf));
	}

	/**
	 * Methode terminée, à ne pas modifier, test reussi !
	 * @param $identifiant
	 * @param $nom
	 * @param $prenom
	 * @param $mail
	 * @param $motDePasse
	 * @return void
	 */
	public function ajoutCompteAdministrateur($identifiant, $nom, $prenom, $mail, $motDePasse, $pf = 5){
    	$role = 'administrateur';
    	$motDePasseHash = crypt($motDePasse, 'md5');
    	$requette = $this->bd->prepare("INSERT INTO utilisateur(id_utilisateur, nom, prenom, mail, mdp, role, point_fid ) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role, :pointsFidel)");
    	$requette->execute(array(
        	'identifiant' => $identifiant ,
        	'nom' => $nom ,
        	'prenom' => $prenom ,
        	'mail' => $mail,
        	'motDePasse' => $motDePasseHash,
        	'role' => $role,
			'pointsFidel' => $pf));
	}

	public function infoCompte($id_utilisateur){
    	$requette = $this->bd->prepare("SELECT * from client where id_utilisateur = :id_utilisateur");
		$requette->bindValue(':id_utilisateur',$id_utilisateur);
    	$requette->execute();
    	return $requette->fetchall();
	}

	public function supprimerCompte($identifiant){
    	$requette = $this->bd->prepare("DELETE FROM utilisateur where id_utilisateur=:identifiant");
		$requette->bindValue('identifiant', $identifiant);
		$requette->execute();
	}

	public function supprimerArticle($article){
		$requete = $this->bd->prepare("DELETE FROM article where id_article=:article");
		$requete->bindValue('article', $article);
		$requete->execute();
	}

	public function deleguerCompteAdmin($idadmin,$iduser){
		$requete1 = $this->bd->prepare("UPDATE utilisateur SET role = 'administrateur' WHERE id_utilisateur=:iduser");
		$requete1->bindValue('iduser', $iduser);
		$requete1->execute();
		$requete2 = $this->bd->prepare("UPDATE utilisateur SET role = 'utilisateur' WHERE id_utilisateur=:idadmin");
		$requete2->bindValue('idadmin', $idadmin);
		$requete2->execute();
	}

	public function reapprovisionnement($idArticle, $qte){
		$requete = $this->bd->prepare("update article set nb_article = nb_article + :qte where id_article = :idArticle");
		$requete->bindValue('idArticle', $idArticle);
		$requete->bindValue('qte', $qte);
		$requete->execute();
	}

	public function envoiNotification(){
    	return null;
	}

	public function fixerStockBas($idArticle, $minimum){
    	return null;
	}

	public function setNomArticle($identifiant, $nom){
        $requette = $this->bd->prepare("UPDATE article SET nom_article = :nom where id_article = :identifiant");
        $requette->execute(array(
            'nom' => $nom ,
            'identifiant' => $identifiant
        ));

    }
    public function setPrix($identifiant, $prix){
        $requette = $this->bd->prepare("UPDATE article SET prix = :prix where id_article = :identifiant");
        $requette->execute(array(
            'prix' => $prix ,
            'identifiant' => $identifiant));
    }
    public function setCategorie($identifiant, $categorie){
        $requette = $this->bd->prepare("UPDATE article SET categorie = :categorie where id_article = :identifiant");
        $requette->execute(array(
            'categorie' => $categorie ,
            'identifiant' => $identifiant));

    }
    public function setInformations($identifiant, $info){
        $requette = $this->bd->prepare("UPDATE article SET informations = :info where id_article = :identifiant");
        $requette->execute(array(
            'info' => $info ,
            'identifiant' => $identifiant));
    }
    public function setNbArticle($identifiant, $nbArticle){
        $requette = $this->bd->prepare("UPDATE article SET nb_article = :nbArticle where id_article = :identifiant");
        $requette->execute(array(
            'nbArticle' => $nbArticle ,
            'identifiant' => $identifiant));
    }

	public function getSnack(){
        $requete = $this->bd->prepare("SELECT * FROM article WHERE categorie = 'snack'");
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getBoisson(){
        $requete = $this->bd->prepare("SELECT * FROM article WHERE categorie = 'boisson'");
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getSoda(){
        $requete = $this->bd->prepare("SELECT * FROM article WHERE categorie = 'soda'");
        $requete->execute();
        return $requete->fetchAll();
    }

	public function getArticle(){
		$requete =$this->bd->prepare("SELECT * FROM article;");
		$requete->execute();
		return $requete->fetchAll();
	}

	public function ajouterArticle($infos){
		$requete = $this->bd->prepare("INSERT INTO article (nom_article, prix, informations, categorie,nb_article, id_article) VALUES (:nom_article, :prix, :informations, :categorie, :nb_article, :id_article)");
		$marqueurs = ['nom_article', 'prix', 'informations', 'categorie','nb_article','id_article'];
		foreach ($marqueurs as $val){
			$requete->bindValue(':' .$val, $infos[$val]);
		}
		$requete->execute();
		return (bool) $requete->rowCount();
	}

	public function getInformationArticle($id_article){
		$requete = $this->bd->prepare('SELECT * FROM article WHERE id_article = :id_article');
		$requete->bindValue(':id_article', $id_article);
		$requete->execute();
		return $requete->fetch(PDO::FETCH_ASSOC);
	}

	public function updateArticle($infos){
		$requete = $this->bd->prepare('UPDATE article SET nom_article=:nom_article, prix=:prix,informations=:informations,categorie=:categorie,nb_article=:nb_article WHERE id_article=:id_article');
		$marqueurs = ['nom_article', 'prix', 'informations', 'categorie','nb_article','id_article'];
		foreach ($marqueurs as $val) {
			$requete->bindValue(':' .$val, $infos[$val]);
		}
		$requete->execute();
		return (bool) $requete->rowCount();
	}

	public function getComptes(){
		$requete =$this->bd->prepare("SELECT * FROM utilisateur;");
		$requete->execute();
		return $requete->fetchAll();
	}

	public function getInformationCompte($id_utilisateur){
		$requete = $this->bd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');
		$requete->bindValue(':id_utilisateur', $id_utilisateur);
		$requete->execute();
		return $requete->fetch(PDO::FETCH_ASSOC);
	}

	public function updateCompte($infos){
		$requete = $this->bd->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,role=:role WHERE id_utilisateur=:id_utilisateur');
		$marqueurs = ['nom', 'prenom', 'role','id_utilisateur'];
		foreach ($marqueurs as $val) {
			$requete->bindValue(':' .$val, $infos[$val]);
		}
		$requete->execute();
		return (bool) $requete->rowCount();
	}
}
?>
