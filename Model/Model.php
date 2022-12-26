<?php

class Model {
    private $bd;
    private static $instance = null;

    private function __construct(){
        $this->bd = new PDO("pgsql:host=localhost;dbname=site", "", "");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET charset utf-8");
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

    public function calculAchat(){
        return null;
    }

    public function enregistrerAchat(){
        return null;
    }

    public function maxAchat(){

    }

    public function consulterHistorique(){
        return null;
    }

    public function consulerPariteAchat(){
        return null;
    }

    public function estEnStock(){
        return null;
    }

    public function ajouterArticle($article){
        return null;
    }

    public function reduction(){
        return null;
    }

    public function ajouterCompte($identifiant, $nom, $prenom, $mail, $motDePasse){
        $requette = $this->bd->prepare("INSERT INTO utilisateur(identifiant, ) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role)");
        $role = 'utilisateur';

        $requette->bindValue(':identifiant', $identifiant);
        $requette->bindValue(':nom', $nom);
        $requette->bindValue(':prenom', $prenom);
        $requette->bindValue(':mail', $mail);

        $motDePasseHash = crypt($motDePasse, 'md5');
        $requette->bindValue(':motDePasse', $motDePasseHash);

        $requette->bindValue(':role', $role);
    }

    public function ajoutCompteAdministrateur($identifiant, $nom, $prenom, $mail, $motDePasse){
        $requette = $this->bd->prepare("INSERT INTO utilisateur(identifiant, ) VALUES (:identifiant , :nom , :prenom, :mail, :motDePasse, :role)");
        $role = 'administrateur';

        $requette->bindValue(':identifiant', $identifiant);
        $requette->bindValue(':nom', $nom);
        $requette->bindValue(':prenom', $prenom);
        $requette->bindValue(':mail', $mail);

        $motDePasseHash = crypt($motDePasse, 'md5');
        $requette->bindValue(':motDePasse', $motDePasseHash);

        $requette->bindValue(':role', $role);
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