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


	public function getNbArticle(){
		$requette = $this->bd->prepare("SELECT COUNT(*) from article");
		$requette->execute();
		$tableau = $requette->fetch(PDO::FETCH_NUM);
		return $tableau[0];
	}
	public function consulterInventaire(){
		$requette = $this->bd->prepare("SELECT * from article ORDER BY nb_article DESC");
		$requette->execute();
		return $requette->fetchall();;
	}

	public function consulterHistorique($id_utilisateur){
		$requette = $this->bd->prepare("SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article WHERE id_utilisateur = :id_utilisateur ORDER BY date_achat DESC");
		$requette->bindValue(':id_utilisateur',$id_utilisateur);
		$requette->execute();
		return $requette->fetchall();
	}

	public function historiqueClientFiltre($filtre) {
		$req = "SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article WHERE id_utilisateur = :id_utilisateur ORDER BY ";
		if ($filtre == 'prix') {
			$requete = $this->bd->prepare($req ."article.prix");
		} else {
			$requete = $this->bd->prepare($req ."historique_commande_util." .$filtre);
		}
		$requete->bindValue(':id_utilisateur',$_SESSION['id_utilisateur']);
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_ASSOC);
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

	public function historiqueFiltre($filtre) {
		$req = "SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article ORDER BY ";
		if ($filtre == 'prix') {
			$requete = $this->bd->prepare($req ."article.prix");
		} else {
			$requete = $this->bd->prepare($req ."historique_commande_util." .$filtre);
		}
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_ASSOC);
	}

	public function bilanFiltre($filtre)
	{
		$req = "SELECT * FROM historique_commande_util JOIN article ON historique_commande_util.id_article=article.id_article WHERE DATE_FORMAT(date_achat,'%m %Y')=DATE_FORMAT(CURRENT_DATE,'%m %Y') ORDER BY ";
		if ($filtre == 'prix') {
			$requete = $this->bd->prepare($req . "article.prix");
		} else {
			$requete = $this->bd->prepare($req . "historique_commande_util." . $filtre);
		}
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getArticle(){
		$requete =$this->bd->prepare("SELECT * FROM article;");
		$requete->execute();
		return $requete->fetchAll();
	}

	public function ajouterArticle($infos){
		$requete = $this->bd->prepare("INSERT INTO article (nom_article, prix, informations, categorie,nb_article, id_article, image) VALUES (:nom_article, :prix, :informations, :categorie, :nb_article, :id_article, :image)");
		$marqueurs = ['nom_article', 'prix', 'informations', 'categorie','nb_article','id_article','image'];
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
		$requete =$this->bd->prepare("SELECT * FROM utilisateur ORDER BY id_utilisateur;");
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

	public function inscription($infos) {
		$requete = $this->bd->prepare("INSERT INTO utilisateur (id_utilisateur,nom,prenom,mail,mdp,role,date_creation,point_fid) 
											VALUES (:id_utilisateur , :nom , :prenom, :mail, :mdp,'utilisateur', CURRENT_DATE, 5)");
		$marqueurs = ['id_utilisateur', 'nom', 'prenom','mail','mdp'];
		foreach ($marqueurs as $val){
			$requete->bindValue(':' .$val, $infos[$val]);
		}
		$requete->execute();
		return (bool) $requete->rowCount();
	}

	public function getListeIdentifiants() {
		$requete = $this->bd->prepare("SELECT id_utilisateur FROM utilisateur");
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getIdentifiantsLogin(){
		$requete = $this->bd->prepare("SELECT id_utilisateur FROM utilisateur");
		$requete->execute();
		return $requete->fetchAll(PDO::FETCH_UNIQUE);
	}

	public function dateConnexion($id_utilisateur){
		$requete = $this->bd->prepare("SELECT CURRENT_TIMESTAMP");
		$requete2 = $this->bd->prepare("UPDATE utilisateur SET date_connexion= CURRENT_TIMESTAMP WHERE id_utilisateur=:id_utilisateur");
		$requete2->bindValue(':id_utilisateur',$id_utilisateur);
		$requete->execute();
		$requete2->execute();
		return $requete->fetch(PDO::FETCH_ASSOC);
	}

}
?>
