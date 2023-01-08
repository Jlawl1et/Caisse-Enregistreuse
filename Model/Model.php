<?php
class Model {
	private $bd;
	private static $instance = null;

	private function __construct(){
    	$this->bd = new PDO("pgsql:host=51.77.214.196;dbname=ubuntu", "ubuntu", "Andromeda");
    	$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$this->bd->query("SET nameS 'utf8'");
	}

	public static function getModel(){
    	if (self::$instance == null){
        	self::$instance = new self();
    	}
    	return self::$instance;
	}

	/*
 	* cette fonction permet de verifier si le compte est dans la base de données
 	* paramêtres : identifiant et mot de passe
 	* return bool
 	*/
	public function connexion($identifiant, $motDePasse){
    	$reqette = $this->bd->prepare("SELECT id_utilisateur, mdp from utilisateur where identifiant = ':identifiant'");
    	$reqette->bindValue(':identifiant', $identifiant);
    	$reqette->execute();
    	$tab = $reqette->fetch(PDO::FETCH_ASSOC);
    	$row = $reqette->rowCount();

    	if ($row == 1){
        	$motDePasseHash = crypt($motDePasse , "md5");
        	if(password_verify($tab["mdp"] , $motDePasseHash)){
            	return true;
        	}
    	return false;
    	}
	}

	public function consulterInventaire(){
    	return null;
	}
	/*
 	* cette fonction permet de calculer le montant des achats d’articles et retourne son prix total.
 	* return int
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
    	$stmt->bind_param("sdss", $nom, $prix, $quantite, $date);

    	// Affectez les valeurs aux paramètres
    	$nom = $achats->nom;
    	$prix = $achats->prix;
    	$quantite = $achats->quantite;
    	$date = $achats->date;

    	// Exécutez la requête
    	$stmt->execute();

    	// Fermez la connexion à la base de données
    	$conn->close();
}



	public function maxAchat(){

	}

	public function consulterHistorique($client){
		$requette = $this->bd->prepare("SELECT * from historique_commande join client on  id_utilisateur = :id_utilisateur  ");
		$reqette->bindValue(':id_utilisateur',$client);
		$requette->execute();
		return $requette->fetchall();
	}

	public function consulerPariteAchat(){
		$requette = $this->bd->prepare("SELECT * from historique_commande order by heure_achat,date_achat DESC LIMIT 20 ");
  	$requette->execute();
  	return $requette->fetchall();
    	;
	}

	public function estEnStock($article){
		$reqette = $this->bd->prepare("SELECT nb_article from article where id_article = :id_article  ");
		$reqette->bindValue(':id_article',$article);
  	$reqette->execute();
  	$tab = $reqette->fetch(PDO::FETCH_NUM);
		if ($tab[0] > 0){
			echo '<p>'. " l'article numero " . ':id_article' . 'est encore en stock ' . "</p>";
		}

    	;
	}

	public function ajouterArticle($article){
    	return null;
	}

	public function reduction(){
    	return null;
	}

	public function ajouterCompte($identifiant, $nom, $prenom, $mail, $motDePasse){
    	$requette = $this->bd->prepare("INSERT INTO utilisateur(identifiant, nom, prenom, mail, mdp, role) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role)");
    	$role = 'utilisateur';
    	$motDePasseHash = crypt($motDePasse, 'md5');
    	$requette->execute(array(
        	'identifiant' => $identifiant ,
        	'nom' => $nom ,
        	'prenom' => $prenom ,
        	'mail' => $mail,
        	'motDePasse' => $motDePasseHash,
        	'role' => $role));
	}

	public function ajoutCompteAdministrateur($identifiant, $nom, $prenom, $mail, $motDePasse){
    	$role = 'administrateur';
    	$motDePasseHash = crypt($motDePasse, 'md5');
    	$requette = $this->bd->prepare("INSERT INTO utilisateur(id_utilisateur, nom, prenom, mail, mdp, role ) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role)");
    	$requette->execute(array(
        	'identifiant' => $identifiant ,
        	'nom' => $nom ,
        	'prenom' => $prenom ,
        	'mail' => $mail,
        	'motDePasse' => $motDePasseHash,
        	'role' => $role));
	}

	public function infoCompte($identifiant){
    	return null;
	}

	public function supprimerCompte($identifiant){
    	return null;
	}

	public function supprimerArticle($article){
    	return null;
	}

	public function deleguerCompteAdmin($identifiant){
    	return null;
	}

	public function rapprovisionnement($idArticle, $qte){
    	return null;
	}

	public function envoiNotification(){
    	return null;
	}

	public function fixerStockBas($idArticle, $minimum){
    	return null;
	}

}
?>
